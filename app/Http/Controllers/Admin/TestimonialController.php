<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Motor;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::with('motor')->latest()->paginate(10);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        $motors = Motor::where('is_active', true)->orderBy('name')->get();
        return view('admin.testimonials.create', compact('motors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_location' => 'nullable|string|max:255',
            'motor_id' => 'nullable|exists:motors,id',
            'testimonial' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'customer_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_featured' => 'boolean',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        
        if ($request->hasFile('customer_photo')) {
            $data['customer_photo'] = $request->file('customer_photo')->store('testimonials', 'public');
        }

        Testimonial::create($data);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial berhasil ditambahkan.');
    }

    public function show(Testimonial $testimonial)
    {
        $testimonial->load('motor');
        return view('admin.testimonials.show', compact('testimonial'));
    }

    public function edit(Testimonial $testimonial)
    {
        $motors = Motor::where('is_active', true)->orderBy('name')->get();
        return view('admin.testimonials.edit', compact('testimonial', 'motors'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_location' => 'nullable|string|max:255',
            'motor_id' => 'nullable|exists:motors,id',
            'testimonial' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'customer_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_featured' => 'boolean',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        
        if ($request->hasFile('customer_photo')) {
            // Delete old photo
            if ($testimonial->customer_photo) {
                Storage::disk('public')->delete($testimonial->customer_photo);
            }
            $data['customer_photo'] = $request->file('customer_photo')->store('testimonials', 'public');
        }

        $testimonial->update($data);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial berhasil diperbarui.');
    }

    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->customer_photo) {
            Storage::disk('public')->delete($testimonial->customer_photo);
        }
        
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial berhasil dihapus.');
    }
}