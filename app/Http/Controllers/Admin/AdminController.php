<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Motor;
use App\Models\CompanyInfo;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalMotors = Motor::count();
        $totalModels = \App\Models\MotorModel::count();
        $activeModels = \App\Models\MotorModel::where('is_active', true)->count();
        $featuredModels = \App\Models\MotorModel::where('is_featured', true)->count();
        $categories = Motor::distinct('category')->count('category');
        
        $recentMotors = Motor::with(['models', 'featuredModels'])->latest()->take(5)->get();
        
        return view('admin.dashboard', compact(
            'totalMotors', 
            'totalModels',
            'activeModels', 
            'featuredModels', 
            'categories',
            'recentMotors'
        ));
    }

    public function login()
    {
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($request->only('email', 'password'))) {
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('admin.login');
    }
}
