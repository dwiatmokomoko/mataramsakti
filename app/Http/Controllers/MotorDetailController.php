<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use App\Models\MotorModel;
use Illuminate\Http\Request;

class MotorDetailController extends Controller
{
    public function show(Motor $motor)
    {
        // Load motor dengan semua models dan variants
        $motor->load(['models.variants', 'models' => function($query) {
            $query->where('is_active', true)->orderBy('price_otr', 'asc');
        }]);
        
        // Ambil motor terkait berdasarkan kategori (ambil MotorModel, bukan Motor)
        $relatedMotors = MotorModel::with(['motor', 'availableVariants'])
            ->whereHas('motor', function($query) use ($motor) {
                $query->where('category', $motor->category)
                      ->where('id', '!=', $motor->id);
            })
            ->where('is_active', true)
            ->take(4)
            ->get();

        return view('motor-detail', compact('motor', 'relatedMotors'));
    }

    public function calculateCredit(Request $request, Motor $motor)
    {
        $request->validate([
            'dp_amount' => 'required|numeric|min:0',
            'tenor' => 'required|integer|min:6|max:60',
            'model_id' => 'nullable|exists:motor_models,id'
        ]);

        // Ambil harga dari model yang dipilih atau model utama
        if ($request->model_id) {
            $motorModel = MotorModel::find($request->model_id);
            $price = $motorModel->price_otr;
        } else {
            $price = $motor->main_model ? $motor->main_model->price_otr : 0;
        }

        $dp = $request->dp_amount;
        $tenor = $request->tenor;
        
        // Simple calculation (in real app, use proper interest rates)
        $principal = $price - $dp;
        $interestRate = 0.12; // 12% per year
        $monthlyRate = $interestRate / 12;
        
        $monthlyPayment = $principal * ($monthlyRate * pow(1 + $monthlyRate, $tenor)) / 
                         (pow(1 + $monthlyRate, $tenor) - 1);

        return response()->json([
            'monthly_payment' => number_format($monthlyPayment, 0, ',', '.'),
            'total_payment' => number_format($dp + ($monthlyPayment * $tenor), 0, ',', '.'),
            'total_interest' => number_format(($monthlyPayment * $tenor) - $principal, 0, ',', '.')
        ]);
    }
}
