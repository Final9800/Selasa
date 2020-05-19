<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles =Role::all();
        return view('addRole',compact('roles'));
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
        $data = $request->validate([
            'name'=>'max:10| required',
            'role'=>'required',
            'IdRole'=>'required|numeric'

        ]);

        Role::create([
            'name'=>$data->name,
            'role'=>$data->role,
            'role_id'=>$data->IdRole
        ]);

        return  redirect('/addRole');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
            if (Auth::check())
                return Redirect::route('dashboard');

            return View::make('login');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    public function showedit($id){
        $viewRole = Role::find($id);
        return view('editRole',compact('viewRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $viewRole = Role::find($id);
        $viewRole->update([
            'name'=>$request->input('name'),
            'role'=>$request->input('role'),
            'role_id'=>$request->input('IdRole'),
        ]);
        return redirect('/addRole');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }
    public function storeImage(Request $request){
        if ($request->hasFile('coverBook')) {
            $images = $request->coverBook->getClientOriginalName();
            $images = time().'_'.$images; // Add current time before image name
            $request->coverBook->storeAs('cover',$images);
        $data = $request->only('judul', 'author');
        $path = $request->file('coverBook')->store('cover');
        // dd($path);
        Role::create([
            'name' => $data['judul'],
            'author' => $data['author'],
            'cover' => $path,
        ]);


    //     $cover = $request->file('coverBook');
    // $extension = $cover->getClientOriginalExtension();
    // Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));

    // $book = new Role();
    // $book->name = $request->name;
    // $book->author = $request->author;
    // $book->mime = $cover->getClientMimeType();
    // $book->original_filename = $cover->getClientOriginalName();
    // $book->filename = $cover->getFilename().'.'.$extension;
    // $book->save();

        return redirect('/book');
    }
    public function viewImage(){
        $books = Role::all();
        // dd($books);
        return view('library',compact('books'));
    }
}
