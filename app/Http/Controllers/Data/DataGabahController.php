<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Models\Gabah;
use App\Models\Pemilik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class DataGabahController extends Controller
{
    public function index()
    {
        $data["pemilik"] = Pemilik::all();
        
        return view('gabah.gabah', $data);
    }

    public function store(Request $request)
    {
    }

    public function show(string $id)
    {
        return response()->json(Pemilik::find($id));
    }
    public function edit($id)
    {
        $result = Pemilik::with('gabah')->find($id);
        // $result = DB::table('pemilik')
        //     ->join('gabah', 'pemilik.id', '=', 'gabah.id_pemilik')
        //     ->where('gabah.id', '=', $id)
        //     ->first();
    
        if ($result) {
            return response()->json(['data' => $result]);
        } else {
            return response()->json(['message' => 'Data not found.'], 404);
        }
    }
    public function update(Request $request, string $id)
    {
        Pemilik::where("id", $id)->update([
            
            "nama" => $request->nama
        ]);

        dd($id);

        // return back()->with('success', 'Data berhasil ditambahkan!');
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil diubah'
        ]);

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