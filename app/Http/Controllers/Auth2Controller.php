<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Yajra\DataTables\Utilities\Request;
use Illuminate\Support\Str;

class Auth2Controller extends Controller
{
    public function register(Request $request)
    {
        //validate
        $validator = Validator::make($request->all(),[
            'username' => 'required|string|unique:users',
            'password' => 'required|string|min:8'
            // 'nama' => 'required|string'
            // 'no_hp' => 'required|numeric|min:12|max:13',
            // 'alamat' => 'required|string',
            // 'image' => 'required|string|image'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }
    
        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);

        // Memberikan peran "admin" kepada pengguna
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()
        ->json(['data' => $user,'access_token' => $token, 'token_type' => 'Bearer']);
    }

    
    
    public function login(Request $request)
    {
        if(!Auth::attempt($request->only('username', 'password')))
        {
            return response()
                ->json(['message' => 'User tidak terdaftar'], 401);
        }
        $user = User::where('username', '=', $request->only('username'))->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()
            ->json(['message' => 'Berhasil, Selamat datang '.$user->username.' ','access_token' => $token, 'token_type' => 'Bearer']);
    }

    public function logout()
    {
        auth()->user()->tokens->delete();

        return [
            'message' =>'Terima Kasih'
        ];
    }
}
