<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PriceList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PriceListController extends Controller
{
    const MAX_FILE_SIZE = 5 * 1024 * 1024; // 5MB in bytes
    const STORAGE_PATH = 'price-lists';

    public function index()
    {
        $priceLists = PriceList::orderBy('created_at', 'desc')->get();
        return view('admin.price-lists.index', compact('priceLists'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:pdf|max:5120',
            'description' => 'nullable|string|max:500',
        ], [
            'file.required' => 'File harus dipilih',
            'file.mimes' => 'File harus berformat PDF',
            'file.max' => 'Ukuran file tidak boleh lebih dari 5MB',
            'description.max' => 'Deskripsi tidak boleh lebih dari 500 karakter',
        ]);

        try {
            $file = $request->file('file');
            $originalName = $file->getClientOriginalName();
            $fileSize = $file->getSize();

            // Generate unique filename
            $uniqueName = time() . '_' . uniqid() . '.pdf';
            
            // Store file
            $filePath = $file->storeAs(self::STORAGE_PATH, $uniqueName, 'public');

            // Create PriceList record
            PriceList::create([
                'filename' => $originalName,
                'file_size' => $fileSize,
                'file_path' => $filePath,
                'description' => $request->input('description'),
            ]);

            return redirect()->route('admin.price-lists.index')
                ->with('success', 'Daftar harga berhasil diupload');
        } catch (\Exception $e) {
            return redirect()->route('admin.price-lists.index')
                ->with('error', 'Terjadi kesalahan saat mengupload file: ' . $e->getMessage());
        }
    }

    public function update(Request $request, PriceList $priceList)
    {
        $request->validate([
            'file' => 'nullable|file|mimes:pdf|max:5120',
            'description' => 'nullable|string|max:500',
        ], [
            'file.mimes' => 'File harus berformat PDF',
            'file.max' => 'Ukuran file tidak boleh lebih dari 5MB',
            'description.max' => 'Deskripsi tidak boleh lebih dari 500 karakter',
        ]);

        try {
            $data = [
                'description' => $request->input('description'),
            ];

            // If new file is uploaded
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $originalName = $file->getClientOriginalName();
                $fileSize = $file->getSize();

                // Delete old file
                if ($priceList->file_path && Storage::disk('public')->exists($priceList->file_path)) {
                    Storage::disk('public')->delete($priceList->file_path);
                }

                // Generate unique filename
                $uniqueName = time() . '_' . uniqid() . '.pdf';
                
                // Store new file
                $filePath = $file->storeAs(self::STORAGE_PATH, $uniqueName, 'public');

                $data['filename'] = $originalName;
                $data['file_size'] = $fileSize;
                $data['file_path'] = $filePath;
            }

            $priceList->update($data);

            return redirect()->route('admin.price-lists.index')
                ->with('success', 'Daftar harga berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->route('admin.price-lists.index')
                ->with('error', 'Terjadi kesalahan saat memperbarui file: ' . $e->getMessage());
        }
    }

    public function destroy(PriceList $priceList)
    {
        try {
            // Delete file from storage
            if ($priceList->file_path && Storage::disk('public')->exists($priceList->file_path)) {
                Storage::disk('public')->delete($priceList->file_path);
            }

            // Delete database record
            $priceList->delete();

            return redirect()->route('admin.price-lists.index')
                ->with('success', 'Daftar harga berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('admin.price-lists.index')
                ->with('error', 'Terjadi kesalahan saat menghapus file: ' . $e->getMessage());
        }
    }
}
