<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Document as ModelsDocument;

use Barryvdh\DomPDF\Facade\Pdf;
class DocumentExportPDF extends Controller
{


    public function index()
    {
        $document = ModelsDocument::get();
        return view('livewire.components.documentExportPDF', compact('document'));
    }

    public function exportPDF()
    {
        $document = ModelsDocument::all();

        $pdf = PDF::loadView('livewire.components.documentExportPDF', ['document' => $document]);

        return $pdf->download('document' . rand(1, 1000) . '.pdf');
    }
}
