<?php

namespace App\Http\Controllers;

use App\Models\PDFDoc;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    /**
     * Load Every Documents Files.
     *
     * @return view
     */
    public function index()
    {
        return view('pages.dashboard');
    }

    /**
     * PDF Upload.
     *
     * @return void
     */
    public function pdfUpload(Request $request)
    {
        if ($request->hasFile('file')) {
            $file_unique_name = 'pdf_'.Str::random(8).'.pdf';
            $request->file('file')->storePubliclyAs(
                'pdfs',
                $file_unique_name,
                'public'
            );

            $pdfDoc = PDFDoc::create([
                'name' => $request->file('file')->getClientOriginalName(),
                'file_name' => $file_unique_name,
                'mime_type' => $request->file('file')->getClientMimeType(),
                'size' => $request->file('file')->getSize(),
            ]);

            return ['success' => 'true', 'pdf' => $pdfDoc];
        }
    }
}
