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
                    ->get();
    
        // Jika ingin memfilter data berdasarkan role member, Anda bisa menggunankan code berikut:
        // if(getRoleName() == 'member'){
        //     $data = $data->where('member_id', auth()->user()->member->id);
        // }
    
        return DataTables::of($data)->make();
    }
}
