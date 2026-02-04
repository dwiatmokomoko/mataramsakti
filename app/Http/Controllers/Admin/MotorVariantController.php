<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Motor;
use App\Models\MotorModel;
use App\Models\MotorVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MotorVariantController extends Controller
{
    public function index(Motor $motor, MotorModel $motorModel)
    {
        $variants = $motorModel->variants()->latest()->get();
        return view('admin.motor-variants.index', compact('motor', 'motorModel', 'variants'));
    }

    public function create(Motor $motor, MotorModel $motorModel)
    {
        return view('admin.motor-variants.create', compact('motor', 'motorModel'));
    }

    public function store(Request $request, Motor $motor, MotorModel $motorModel)
    {
        $request->validate([
            'color_name' => 'required|string|max:255',
            'color_code' => 'nullable|string|max:255', // Allow CSS gradients
            'price_difference' => 'nullable|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_available' => 'boolean'
        ]);

        $data = $request->all();
        $data['motor_model_id'] = $motorModel->id;
        $data['price_difference'] = $data['price_difference'] ?? 0;
        
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('motor-variants', 'public');
        }

        MotorVariant::create($data);

        return redirect()->route('admin.motors.models.variants.index', [$motor, $motorModel])
            ->with('success', 'Varian warna berhasil ditambahkan');
    }

    public function edit(Motor $motor, MotorModel $motorModel, MotorVariant $variant)
    {
        return view('admin.motor-variants.edit', compact('motor', 'motorModel', 'variant'));
    }

    public function update(Request $request, Motor $motor, MotorModel $motorModel, MotorVariant $variant)
    {
        $request->validate([
            'color_name' => 'required|string|max:255',
            'color_code' => 'nullable|string|max:255', // Allow CSS gradients
            'price_difference' => 'nullable|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_available' => 'boolean'
        ]);

        $data = $request->all();
        $data['price_difference'] = $data['price_difference'] ?? 0;
        
        if ($request->hasFile('image')) {
            // Delete old image
            if ($variant->image) {
                Storage::disk('public')->delete($variant->image);
            }
            $data['image'] = $request->file('image')->store('motor-variants', 'public');
        }

        $variant->update($data);

        return redirect()->route('admin.motors.models.variants.index', [$motor, $motorModel])
            ->with('success', 'Varian warna berhasil diupdate');
    }

    public function destroy(Motor $motor, MotorModel $motorModel, MotorVariant $variant)
    {
        if ($variant->image) {
            Storage::disk('public')->delete($variant->image);
        }
        
        $variant->delete();

        return redirect()->route('admin.motors.models.variants.index', [$motor, $motorModel])
            ->with('success', 'Varian warna berhasil dihapus');
    }
}
