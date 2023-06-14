<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class DataLandingController extends Controller
{
    public function datatable(Request $request)
    {
        $data = DB::table('pemilik')

                    ->join('gabah', 'pemilik.id', '=', 'gabah.id_pemilik')
                    ->where('gabah.klasifikasi', 'kering')
                    ->get();
    
        return DataTables::of($data)->make();
    }

    public function datatable2(Request $request)
    {
        $data = DB::table('pemilik')

                    ->join('gabah', 'pemilik.id', '=', 'gabah.id_pemilik')
                    ->where('gabah.klasifikasi', 'basah')
                    ->get();
    
        return DataTables::of($data)->make();
    }
}
