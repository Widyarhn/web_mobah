<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function index()
    {
        $data["users"] = User::all();
        $data["edit"] = User::where("id", Auth::user()->id)->first();
        
        return view("adminApp.Profil", $data);
    }
}
