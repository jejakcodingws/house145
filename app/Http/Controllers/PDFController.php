<?php

namespace App\Http\Controllers;
use Mpdf\Mpdf;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Invoice;
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class PDFController extends Controller
{
    public function downloadpdf(string $id)
    {   
        $data = DB::select(
            "SELECT *
            FROM invoice
            WHERE id = :id",
            ['id' => $id]
        );
      $pdf = \PDF::loadView('layout/layout-cafe/generatepdf',compact('data') );
      $pdf->setPaper('A4','potrait');
      return $pdf->stream('invoice145.pdf');
    }

}


