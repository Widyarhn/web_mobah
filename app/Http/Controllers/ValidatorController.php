<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ValidatorController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('akun.validator.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('akun.validator.create');
    }

    public function store(Request $request){
    // set the default user values
    $defaultUserValues = [
        'password' => bcrypt('password'), // hashed password
        'remember_token' => Str::random(10), // random remember token
    ];

    // create a new user with the given attributes and default values
    $user = User::create([
        'name' => $request->name,
        'username' => $request->username,
    ] + $defaultUserValues);

    // assign the 'validator' role to the new user
    $user->assignRole('validator');
    return redirect()->route('validator.index')->with("Akun Sudah Dibuat");

    }

    public function datatable(Request $request){
        $data = User::get();

        return DataTables::of($data)->make();
    }

    //     

    // }
}
