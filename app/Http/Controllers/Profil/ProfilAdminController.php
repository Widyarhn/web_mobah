<?php

namespace App\Http\Controllers\Profil;

use App\Models\Admin;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfilAdminController extends Controller
{
    public function index()
    {
        $data["users"] = User::all();
        $data["edit"] = User::where("id", Auth::user()->id)->first();
        
        return view("adminApp.Profil", $data);
    }

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
    public function change_password(Request $request, $id){

        if($request->renewpassword != $request->newpassword){
            return redirect()->back()->with('success','Konfirmasi password tidak sesuai');
        }

        User::where("id", $id)->update([
            "password" => bcrypt($request->newpassword)

        ]);

        return redirect("/profil")->with('success','Password updated successfully');
    }
}
