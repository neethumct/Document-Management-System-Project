<?php

namespace App\Http\Controllers;

use App\Exports\DocumentExportExcel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DocumentController extends Controller
{
    public function export()
    {
        return Excel::download(new DocumentExportExcel(), 'document.xlsx');
    }
}
