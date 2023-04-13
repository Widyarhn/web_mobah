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
        
    }

    public function edit($id)
    {
        return response()->json([
            'data'  => User::find($id)

        ]);
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username'  => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error', $validator->errors()->first())
                ->withInput();
        }

        try {
            DB::beginTransaction();

            if(count($request->allFiles()) > 0){
                
                foreach ($request->allFiles() as $key => $item) {
                    $files[$key] = $request->file($key);
                }
                
                foreach($files as $key => $item){
                    $path = 'files/blogs/image/';
                    $nameFile = md5($item->getClientOriginalName(). rand(rand(231, 992), 123882)). "." . $item->getClientOriginalExtension();
                    
                    $image[$key] = $path.$nameFile;
                    $nameFiles[$key] = $nameFile;
                }
            }else{
                $image = [];
            }

            $blog = Blog::find($id);
            $blog->update(
            [
                'title'             => $request->title,
                'desc'              => $request->desc,
            ]+$image);

            BlogCategory::where('blog_id', $id)->delete();
            
            foreach(($request->category_id ?? []) as $item){
                BlogCategory::create([
                    'blog_id'               => $id,
                    'meta_blog_category_id' => $item
                ]);
            }

            if(count($request->allFiles()) > 0){
                if(!File::isDirectory($path)) File::makeDirectory($path, 0755, true, true);
                foreach($files as $key => $file){
                    $file->move($path, $nameFiles[$key]);
                }
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }

        return redirect()->route('blog.index')->with('success', 'Success create Blog Post!');
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
    
    return redirect()->route('validator.index')->with("success", "Akun Sudah Dibuat");

    }

    public function datatable(Request $request){
        $data = User::get();

        return DataTables::of($data)->make();
    }
}
