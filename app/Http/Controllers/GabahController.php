<?php

namespace App\Http\Controllers;

use App\Models\Gabah;
use App\Models\Pemilik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class GabahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data["pemilik"] = Pemilik::all();
        return view('gabah.gabah', $data);
    }


    public function klasifikasi()
    {
        $data["pemilik"] = Pemilik::all();
        return view('gabah.klasifikasi', $data);
    }

    public function monitoring()
    {
        $data["pemilik"] = Pemilik::all();
        return view('gabah.pemantauan', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $pemilik = Pemilik::create([
            "nama" => $request-> nama,
            "no_hp" => $request->no_hp,
            "alamat" => $request-> alamat,
            "created_at" => now(),
            "updated_at" => now()
        ]);
        
        Gabah::create([
            "id_pemilik" => $pemilik->id,
            "jenis" => $request->jenis,
            "berat" => $request-> berat,
            "created_at" => now(),
            "updated_at" => now()
        ]);

        return back()->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Gabah::where("id_pemilik", $id)->update([
            
            "klasifikasi" => $request->klasifikasi
        ]);
        return back()->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
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
