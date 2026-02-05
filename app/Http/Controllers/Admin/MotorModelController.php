<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Motor;
use App\Models\MotorModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MotorModelController extends Controller
{
    public function index(Motor $motor)
    {
        $models = $motor->models()->withCount('variants')->latest()->paginate(10);
        return view('admin.motor-models.index', compact('motor', 'models'));
    }

    public function create(Motor $motor)
    {
        return view('admin.motor-models.create', compact('motor'));
    }

    public function store(Request $request, Motor $motor)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'full_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price_otr' => 'required|numeric|min:0',
            'price_dp' => 'nullable|numeric|min:0',
            'price_installment' => 'nullable|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'specifications' => 'nullable|array',
            'is_featured' => 'boolean',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        $data['motor_id'] = $motor->id;
        
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('motor-models', 'public');
        }

        MotorModel::create($data);

        return redirect()->route('admin.motors.models.index', $motor)
            ->with('success', 'Model motor berhasil ditambahkan');
    }

    public function show(Motor $motor, MotorModel $motorModel)
    {
        $motorModel->load('variants');
        return view('admin.motor-models.show', compact('motor', 'motorModel'));
    }

    public function edit(Motor $motor, MotorModel $motorModel)
    {
        return view('admin.motor-models.edit', compact('motor', 'motorModel'));
    }

    public function update(Request $request, Motor $motor, MotorModel $motorModel)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'full_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price_otr' => 'required|numeric|min:0',
            'price_dp' => 'nullable|numeric|min:0',
            'price_installment' => 'nullable|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'specifications' => 'nullable|array',
            'is_featured' => 'boolean',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        
        if ($request->hasFile('image')) {
            // Delete old image
            if ($motorModel->image) {
                Storage::disk('public')->delete($motorModel->image);
            }
            $data['image'] = $request->file('image')->store('motor-models', 'public');
        }

        $motorModel->update($data);

        return redirect()->route('admin.motors.models.index', $motor)
            ->with('success', 'Model motor berhasil diupdate');
    }

    public function destroy(Motor $motor, MotorModel $motorModel)
    {
        // Check if model has variants
        if ($motorModel->variants()->count() > 0) {
            return redirect()->route('admin.motors.models.index', $motor)
                ->with('error', 'Tidak dapat menghapus model yang memiliki varian warna');
        }

        if ($motorModel->image) {
            Storage::disk('public')->delete($motorModel->image);
        }
        
        $motorModel->delete();

        return redirect()->route('admin.motors.models.index', $motor)
            ->with('success', 'Model motor berhasil dihapus');
    }
}