<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ValidatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data["validator"] = Validator::all();
        
        return view('akun.validator.index', $data);
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

        // Memberikan peran "Validator" kepada pengguna
        $user->assignRole('validator');

        if ($request->hasfile("image"))
        {
            $data = $request->file("image")->store("validator");
        }

        // Membuat data Validator baru
        $validator = Validator::create([
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
        $result = User::with('validator')->find($id);
    
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
        $validator = Validator::find($id);

        if (!$validator) {
            return response()->json(['message' => 'Data not found.'], 404);
        }

        // Mengupdate atribut-atribut Validator kecuali username
        $validator->nama = $request->nama;
        $validator->image = $request->hasFile('image') ? $request->file('image')->store('validator') : $validator->image;
        $validator->no_hp = $request->no_hp;
        $validator->alamat = $request->alamat;

        // Simpan perubahan
        $validator->save();

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
            
            // Find the validator by user ID and delete
            $validator = Validator::where('user_id', $id)->first();
            if ($validator) {
                $validator->delete();
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
            ->join('validator', 'users.id', '=', 'validator.user_id')
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->where('roles.name', 'validator')
            ->get();
    
        return DataTables::of($data)->make();
    }
    
    
}
