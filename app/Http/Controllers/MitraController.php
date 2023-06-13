<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data["mitra"] = Mitra::all();
        
        return view('akun.mitra.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        // Menyiapkan nilai default untuk pengguna
        $default_user_value = [
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ];

        // Membuat pengguna baru
        $user = User::create([
            'username' => $request->username,
            'password' => $default_user_value['password'],
            'remember_token' => $default_user_value['remember_token'],
        ]);

        // Memberikan peran "mitra" kepada pengguna
        $user->assignRole('mitra');

        if ($request->hasfile("image"))
        {
            $data = $request->file("image")->store("mitra");
        }

        // Membuat data Validator baru
        $mitra = Mitra::create([
            'user_id' => $user->id,
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'image' => $data,
        ]);

        
        return response()->json([
            'status' => true,
            'message' => 'Success Add Data Validator!',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = User::with('mitra')->find($id);
    
        if ($result) {
            return response()->json(['data' => $result]);
        } else {
            return response()->json(['message' => 'Data not found.'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
        
    public function update(Request $request, $id)
    {
        $mitra = Mitra::find($id);

        if (!$mitra) {
            return response()->json(['message' => 'Data not found.'], 404);
        }

        // Mengupdate atribut-atribut Validator kecuali username
        $mitra->nama = $request->nama;
        $mitra->image = $request->hasFile('image') ? $request->file('image')->store('mitra') : $mitra->image;
        $mitra->no_hp = $request->no_hp;
        $mitra->alamat = $request->alamat;

        // Simpan perubahan
        $mitra->save();

        // Mengupdate atribut pada tabel 'user'
        $user = User::find($id);
        if ($user) {
            $user->username = $request->username;
            $user->save();
        }

        return response()->json([
            'status' => true,
            'message' => 'Success Update Data Admin!',
        ]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        
        try {
            // Find the user by ID
            $user = User::findOrFail($id);
            
            // Find the mitra by user ID and delete
            $mitra = Mitra::where('user_id', $id)->first();
            if ($mitra) {
                $mitra->delete();
            }
            
            // Delete the user
            $user->delete();
            
            DB::commit();
    
            return response()->json([
                'status' => true,
                'message' => 'Success Delete Data Roadmap!',
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
    
            return response()->json([
                'status' => false,
                'message' => 'Failed to delete data. Error: ' . $e->getMessage(),
            ]);
        }
    }

    public function datatable(Request $request)
    {
        $data = DB::table('users')
            ->join('mitra', 'users.id', '=', 'mitra.user_id')
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->where('roles.name', 'mitra')
            ->get();
    
        return DataTables::of($data)->make();
    }
    
    
}
