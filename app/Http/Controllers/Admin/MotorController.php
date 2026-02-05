<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Motor;
use App\Models\MotorModel;
use Illuminate\Http\Request;

class MotorController extends Controller
{
    public function index(Request $request)
    {
        $query = Motor::withCount(['models', 'activeModels']);
        
        // Search functionality
        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->where(function($q) use ($search) {
                $q->where('name', 'ILIKE', "%{$search}%")
                  ->orWhere('category', 'ILIKE', "%{$search}%")
                  ->orWhere('description', 'ILIKE', "%{$search}%");
            });
        }
        
        // Category filter
        if ($request->filled('category')) {
            $query->where('category', $request->get('category'));
        }
        
        // Status filter
        if ($request->filled('status')) {
            if ($request->get('status') === 'active') {
                $query->where('is_active', true);
            } elseif ($request->get('status') === 'inactive') {
                $query->where('is_active', false);
            }
        }
        
        // Sort
        $sortBy = $request->get('sort', 'created_at');
        $sortOrder = $request->get('order', 'desc');
        
        if (in_array($sortBy, ['name', 'category', 'created_at'])) {
            $query->orderBy($sortBy, $sortOrder);
        } else {
            $query->latest();
        }
        
        $motors = $query->paginate(10)->appends($request->query());
        
        $categories = Motor::distinct('category')->pluck('category')->sort();
        
        return view('admin.motors.index', compact('motors', 'categories'));
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
        try {
            // Check if motor has models
            if ($motor->models()->count() > 0) {
                return redirect()->route('admin.motors.index')
                    ->with('error', 'Tidak dapat menghapus motor yang memiliki model. Hapus semua model terlebih dahulu.');
            }
            
            // Delete associated image if exists
            if ($motor->image && \Storage::disk('public')->exists($motor->image)) {
                \Storage::disk('public')->delete($motor->image);
            }
            
            $motorName = $motor->name;
            $motor->delete();

            return redirect()->route('admin.motors.index')
                ->with('success', "Motor {$motorName} berhasil dihapus");
                
        } catch (\Exception $e) {
            \Log::error('Error deleting motor: ' . $e->getMessage());
            
            return redirect()->route('admin.motors.index')
                ->with('error', 'Terjadi kesalahan saat menghapus motor. Silakan coba lagi.');
        }
    }
    
    /**
     * Delete motor via AJAX
     */
    public function destroyAjax(Motor $motor)
    {
        try {
            // Check if motor has models
            if ($motor->models()->count() > 0) {
                return response()->json([
                    'success' => false,
                    'message' => 'Tidak dapat menghapus motor yang memiliki model. Hapus semua model terlebih dahulu.'
                ], 400);
            }
            
            // Delete associated image if exists
            if ($motor->image && \Storage::disk('public')->exists($motor->image)) {
                \Storage::disk('public')->delete($motor->image);
            }
            
            $motorName = $motor->name;
            $motor->delete();

            return response()->json([
                'success' => true,
                'message' => "Motor {$motorName} berhasil dihapus"
            ]);
            
        } catch (\Exception $e) {
            \Log::error('Error deleting motor via AJAX: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menghapus motor. Silakan coba lagi.'
            ], 500);
        }
    }
}
