<?php

namespace App\Http\Controllers;


use App\Models\Pemilik;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $data["pemilik"] = Pemilik::all();
        return view('adminApp.Laporan', $data);
    }
    public function cetak_pdf() {
        // retreive all records from db
        $data = Pemilik::get();
        $pdf = Pdf::loadView("adminApp.Laporan",["data" => $data])->setPaper("a4");

        return $pdf->stream();
        // return $pdf->download("Data Pasien.pdf");
    }
}
