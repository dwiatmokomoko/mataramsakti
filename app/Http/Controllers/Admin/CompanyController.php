<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function index()
    {
        $company = CompanyInfo::first();
        return view('admin.company.index', compact('company'));
    }

    public function edit()
    {
        $company = CompanyInfo::first();
        return view('admin.company.edit', compact('company'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'vision' => 'nullable|string',
            'mission' => 'nullable|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'website' => 'nullable|url',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $company = CompanyInfo::first();
        $data = $request->all();

        if ($request->hasFile('logo')) {
            // Delete old logo
            if ($company && $company->logo) {
                Storage::disk('public')->delete($company->logo);
            }
            $data['logo'] = $request->file('logo')->store('company', 'public');
        }

        if ($company) {
            $company->update($data);
        } else {
            CompanyInfo::create($data);
        }

        return redirect()->route('admin.company.index')
            ->with('success', 'Informasi perusahaan berhasil diupdate');
    }
}
