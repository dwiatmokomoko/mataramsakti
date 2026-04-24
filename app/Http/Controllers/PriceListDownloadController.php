<?php

namespace App\Http\Controllers;

use App\Models\PriceList;
use Illuminate\Support\Facades\Storage;

class PriceListDownloadController extends Controller
{
    public function download(PriceList $priceList)
    {
        // Check if file exists
        if (!Storage::disk('public')->exists($priceList->file_path)) {
            abort(404, 'File tidak ditemukan');
        }

        // Download the file
        return Storage::disk('public')->download(
            $priceList->file_path,
            $priceList->filename
        );
    }
}
