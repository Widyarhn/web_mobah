<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data["admin"] = Admin::all();
        
        return view('akun.admin.index', $data);
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
    // public function store(Request $request)
    // {

    //     // dd($request->all());
    //     // Menyiapkan nilai default untuk pengguna
    //     $default_user_value = [
    //         'password' => bcrypt('password'),
    //         'remember_token' => Str::random(10),
    //     ];
    
    //     // Membuat pengguna baru
    //     $user = User::create([
    //         'username' => $request->username,
    //         'password' => $default_user_value['password'],
    //         'remember_token' => $default_user_value['remember_token'],
    //     ]);
    
    //     // Memberikan peran "admin" kepada pengguna
    //     $user->assignRole('admin');
    
    //     // Mengelola gambar
    //     $imagePaths = [];
    
    //     if ($request->hasFile('image')) {
    //         $path = 'files/admin/image/';

    //         if (!is_dir($path)) {
    //             // Membuat direktori jika belum ada
    //             mkdir($path, 0777, true);
    
    //             // Mengatur izin pada direktori
    //             chmod($path, 0777);
    //         }
    
    //         foreach ($request->file('image') as $key => $file) {
    //             $nameFile = md5($file->getClientOriginalName() . rand(rand(231, 992), 123882)) . "." . $file->getClientOriginalExtension();
    
    //             $file->move($path, $nameFile);
    
    //             $imagePaths[] = $path.$nameFile;
    //         }
    //     }
    
    //     // Membuat data admin baru
    //     $admin = Admin::create([
    //         'user_id' => $user->id,
    //         'nama' => $request->nama,
    //         'no_hp' => $request->no_hp,
    //         'alamat' => $request->alamat,
    //         'image' => json_encode($imagePaths),
    //     ]);
    
    //     return response()->json([
    //         'status' => true,
    //         'message' => 'Success Add Data Admin!',
    //     ]);
    // }
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

        // Memberikan peran "admin" kepada pengguna
        $user->assignRole('admin');

        if ($request->hasfile("image"))
        {
            $data = $request->file("image")->store("admin");
        }         
        

        // Membuat data admin baru
        $admin = Admin::create([
            'user_id' => $user->id,
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'image' => $data,
        ]);

        
        return response()->json([
            'status' => true,
            'message' => 'Success Add Data Admin!',
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
        $result = User::with('admin')->find($id);
    
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
    // public function update(Request $request, $id)
    // {
    //     // $image = [];
    
    //     // if ($request->hasFile('image')) {
    //     //     $files = $request->file('image');
    
    //     //     foreach ($files as $key => $file) {
    //     //         $path = 'files/admin/image/';
    //     //         $nameFile = md5($file->getClientOriginalName() . rand(rand(231, 992), 123882)) . "." . $file->getClientOriginalExtension();
    
    //     //         $file->move($path, $nameFile);
    
    //     //         $image[$key] = $path . $nameFile;
    //     //     }
    //     // }
        

    //     DB::transaction(function () use ($request, $id) {
    //         // Update tabel pertama
    //         User::where("id", $id)->update([
    //             'name' => $request->nama
    //         ]);

    //         if ($request->file("image")) {
    //             if ($request->image_lama) {
    //                 Storage::delete($request->image_lama);
    //             }
            
    //         $image = $request->file("image")->store("image");
    
    //         }else{
    //             $image= $request->image_lama;
    //         }
    //         // Update tabel kedua
    //         Admin::where("user_id", $id)->update([
    //             'nama' => $request->nama,
    //             'no_hp' => $request->no_hp,
    //             'alamat' => $request->alamat,
    //             'image' => $image,
    //         ]);
        
    //         // Jika tidak ada exception yang dilempar, transaksi akan di-commit secara otomatis
    //     });
    //     // $admin = Admin::find($id);
    //     // if (!$admin) {
    //     //     return response()->json(['message' => 'Data not found.'], 404);
    //     // }
    
    //     // $admin->nama = $request->nama;
    //     // $admin->no_hp = $request->no_hp;
    //     // $admin->alamat = $request->alamat;

    //     // if ($image) {
    //     //     $admin->image = $image;
    //     // }
        
    //     // // Simpan perubahan
    //     // $admin->save();
    
    //     return response()->json([
    //         'status' => true,
    //         'message' => 'Success Update Data Admin!',
    //     ]);
    // }
    
    

    public function update(Request $request, $id)
    {
        $admin = Admin::find($id);

        if (!$admin) {
            return response()->json(['message' => 'Data not found.'], 404);
        }

        // Mengupdate atribut-atribut admin kecuali username
        $admin->nama = $request->nama;
        $admin->image = $request->hasFile('image') ? $request->file('image')->store('admin') : $admin->image;
        $admin->no_hp = $request->no_hp;
        $admin->alamat = $request->alamat;

        // Simpan perubahan
        $admin->save();

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
            
            // Find the admin by user ID and delete
            $admin = Admin::where('user_id', $id)->first();
            if ($admin) {
                $admin->delete();
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
            ->join('admin', 'users.id', '=', 'admin.user_id')
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->where('roles.name', 'admin')
            ->get();
    
        return DataTables::of($data)->make();
    }
    
    
}
