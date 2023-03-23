<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Mitra;
use App\Models\Permission;
use App\Models\StatusUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    // public function register()
    // {
    //     $data['mitra'] = mitraType::where('name', '!=', 'Kemenprim')->orderBy('name', 'asc')->get();

    //     return view('register', $data);
    // }

    public function create(Request $request){
        
        $request->validate([
            'email'     => 'required|unique:users',
            'username'  => 'required|unique:users|min:5',
            'password'  => 'required|min:8'
        ]);

        try {
            DB::beginTransaction();

            $user = User::create([
                'status_user_id'    => StatusUser::where('name', 'unverified')->first()->id,
                'username'          => $request->username,
                'email'             => $request->email,
                'password'          => bcrypt($request->password)
            ])->assignRole('mitra');
    
            $mitra = Mitra::create([
                'user_id'           => $user->id,
                'name'              => $request->name,
                'registered_at'     => date('Y-m-d'),
            ]);


            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            dd($e->getMessage());
        }

        return redirect()->route('auth.login')->with('warning', 'Registration is Success! please check your email for Account Activation!');
    }

    public function authenticate(Request $request){
        
        if(Auth::attempt(['email' => $request->cred, 'password' => $request->password]) 
          || Auth::attempt(['username' => $request->cred, 'password' => $request->password])){
            
            if(Auth::user()->status_user->name == 'unverified') 
                return redirect()->route('auth.login')->with('error', 'Your account is unverified, please check your email for activation!');
            
            $permissions = ['mitra-account', 'approved', 'guest'];

            foreach ($permissions as $data) {
                Permission::updateOrCreate([
                    'name'  => $data
                ]);
            }

            if(Auth::user()->mitra){
                if(Auth::user()->mitra->mitra_type->name == 'Technopark'){
                    Auth::user()->givePermissionTo('mitra-account');
                }
            }
            
            return redirect()->route('dashboard');
        }
        
        return redirect()->route('auth.login')->with('warning', 'Username or Email or Password is wrong!');
    }

    public function accountActivation($id, $rand)
    {
        $user = User::with('status_user')->find($id);

        if($user){
            $status = StatusUser::where('name', 'verified')->first();
            $user->update([
                'status_user_id'    => $status->id
            ]);

            return redirect()->route('auth.login')->with('success', 'Aktivasi Akun berhasil!');
        }

        return redirect()->route('auth.login')->with('error', 'Akun tidak ditemukan');
    }

    public function logout(){

        Auth::logout();

        return redirect()->route('auth.login');
    }
}
