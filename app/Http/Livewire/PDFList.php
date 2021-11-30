<?php

namespace App\Http\Livewire;

use App\Models\PDFDoc;
use Livewire\Component;

class PDFList extends Component
{
    public $pdfs;

    protected $listeners = ['refreshPDFList' => '$refresh'];

    public function render()
    {
        $this->pdfs = PDFDoc::orderBy('created_at', 'desc')->get();

        return view('livewire.p-d-f-list');
    }

    public function refereshList()
    {
        $this->pdfs = PDFDoc::orderBy('created_at', 'desc')->get();
    }
}
