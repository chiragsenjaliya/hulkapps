<?php

namespace App\Http\Livewire;

use App\Models\PDFDoc;
use Livewire\Component;

class DocumentContent extends Component
{
    protected $listeners = ['refreshPDFDoc' => '$refresh'];

    public function render()
    {
        $pdf = PDFDoc::orderBy('created_at', 'desc')->first();

        return view('livewire.document-content', compact('pdf'));
    }
}
