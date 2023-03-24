<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MitraController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('public.contents.mitra.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('public.contents.mitra.cretae');
    }


    public function datatable(Request $request){
        $data = User::get();

        // if(getRoleName() == 'member'){
        //     $data = $data->where('member_id', auth()->user()->member->id);
        // }
        return DataTables::of($data)->make();
    }

    //     

    // }
}
