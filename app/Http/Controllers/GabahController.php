<?php

namespace App\Http\Controllers;

use App\Models\Gabah;
use App\Models\Pemilik;
use Carbon\Carbon;
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
        // $data["pemilik"] = Pemilik::all();
        
        // return view('gabah.gabah', $data);
    }


    public function estimasi()
    {
        $data["pemilik"] = Pemilik::all();
        
        $data["gabah"] = collect(); // Kumpulan gabah hasil pemantauan
        
        foreach ($data["pemilik"] as $pemilik) {
            $gabahTerbaru = Gabah::where('id_pemilik', $pemilik->id)
                ->orderBy('created_at', 'desc')
                ->first();
                
            if ($gabahTerbaru) {
                $data["gabah"]->push($gabahTerbaru);
            }
        }
        
        return view('gabah.estimasi', $data);
    }


    public function monitoring()
    {
        $currentDate = Carbon::now()->toDateString();
        
        $data["pemilik"] = Pemilik::with(['gabah' => function ($query) use ($currentDate) {
            $query->whereDate('updated_at', $currentDate);
        }])->get();

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
        
        // $this->validate($request, [
        //     'nama'     => 'required|string|max:255',
        //     'no_hp'     => 'required|min:12|max:13|number',
        //     'alamat'     => 'required|string|max:255',
        //     'jenis'     => 'required|string|min:3',
        //     'berat'   => 'required|min:2|number'

        // ]);

        $pemilik = Pemilik::create([
            "nama" => $request-> namaC,
            "no_hp" => $request->no_hpC,
            "alamat" => $request-> alamatC,
            "created_at" => now(),
            "updated_at" => now()
        ]);
        
        Gabah::create([
            "id_pemilik" => $pemilik->id,
            "jenis" => $request->jenisC,
            "berat" => $request-> beratC,
            "created_at" => now(),
            "updated_at" => now()
        ]);

        return back()->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id_pemilik)
    {
        $pemilik = Pemilik::find($id_pemilik);
        // dd($pemilik);
        if ($pemilik) {
            $gabah = $pemilik->gabah->groupBy(function ($gabah) {
                return $gabah->created_at->toDateString();
            })->filter(function ($group) {
                return $group->count() > 1;
            })->map(function ($group) {
                return $group->first();
            });
    
            return view('gabah.detailMonitoring', compact('pemilik', 'gabah'));
        } else {
            return response()->json(['message' => 'Data not found.'], 404);
        }
    }
    


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $result = DB::table('pemilik')
            ->join('gabah', 'pemilik.id', '=', 'gabah.id_pemilik')
            ->where('gabah.id', '=', $id)
            ->first();
    
        if ($result) {
            return response()->json(['data' => $result]);
        } else {
            return response()->json(['message' => 'Data not found.'], 404);
        }
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

    // public function perbarui(Request $request, string $id)
    // {
    //     Pemilik::where("id", $id)->update([
            
    //         "nama" => $request->nama
    //     ]);

    //     return back()->with('success', 'Data berhasil ditambahkan!');
    // }

    // public function datatable(Request $request)
    // {
    //     $data = DB::table('pemilik')
    //                 ->join('gabah', 'pemilik.id', '=', 'gabah.id_pemilik')
    //                 ->get();
    
    //     // Jika ingin memfilter data berdasarkan role member, Anda bisa menggunankan code berikut:
    //     // if(getRoleName() == 'member'){
    //     //     $data = $data->where('member_id', auth()->user()->member->id);
    //     // }
    
    //     return DataTables::of($data)->make();
    // }
    
}
