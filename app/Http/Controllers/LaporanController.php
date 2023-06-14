<?php

namespace App\Http\Controllers;


use App\Models\Pemilik;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

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

    public function datatable(Request $request)
    {
        $data = DB::table('pemilik')
                    ->join('gabah', 'pemilik.id', '=', 'gabah.id_pemilik')
                    ->get();
    
        // Jika ingin memfilter data berdasarkan role member, Anda bisa menggunankan code berikut:
        // if(getRoleName() == 'member'){
        //     $data = $data->where('member_id', auth()->user()->member->id);
        // }
    
        return DataTables::of($data)->make();
    }
    
}
