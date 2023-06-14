<?php

namespace App\Http\Controllers;

use App\Models\Gabah;
use App\Models\Mitra;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data["avg"] = Gabah::avg('waktu');
        $data["mitra"] = Mitra::all()->count();
        $data["jenis"] = Gabah::distinct('jenis')->count('jenis');
        return view('adminApp.Admin', $data);
    }

}
