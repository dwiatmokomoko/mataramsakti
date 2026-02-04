<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Motor;
use App\Models\MotorModel;
use Illuminate\Http\Request;

class MotorController extends Controller
{
    public function index()
    {
        $motors = Motor::withCount(['models', 'activeModels'])->latest()->paginate(10);
        return view('admin.motors.index', compact('motors'));
    }

    public function create()
    {
        $categories = ['Maxi', 'Matic', 'Sport', 'Classy', 'Off-Road', 'Moped'];
        return view('admin.motors.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:motors,name',
            'category' => 'required|string',
            'description' => 'nullable|string',
            'is_active' => 'boolean'
        ]);

        Motor::create($request->all());

        return redirect()->route('admin.motors.index')
            ->with('success', 'Motor berhasil ditambahkan');
    }

    public function show(Motor $motor)
    {
        $motor->load(['models.variants']);
        return view('admin.motors.show', compact('motor'));
    }

    public function edit(Motor $motor)
    {
        $categories = ['Maxi', 'Matic', 'Sport', 'Classy', 'Off-Road', 'Moped'];
        return view('admin.motors.edit', compact('motor', 'categories'));
    }

    public function update(Request $request, Motor $motor)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:motors,name,' . $motor->id,
            'category' => 'required|string',
            'description' => 'nullable|string',
            'is_active' => 'boolean'
        ]);

        $motor->update($request->all());

        return redirect()->route('admin.motors.index')
            ->with('success', 'Motor berhasil diupdate');
    }

    public function destroy(Motor $motor)
    {
        // Check if motor has models
        if ($motor->models()->count() > 0) {
            return redirect()->route('admin.motors.index')
                ->with('error', 'Tidak dapat menghapus motor yang memiliki model');
        }
        
        $motor->delete();

        return redirect()->route('admin.motors.index')
            ->with('success', 'Motor berhasil dihapus');
    }
}
