<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;    
use App\Http\Requests\StoreAdminAdmin;
use App\Models\Admin;


class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    } 
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $admins = Admin::orderBy('created_at','desc')->paginate(10);//select * from post order by created_at DESC;
        
        return view('dashboard.admin.index', ['admins'=>$admins]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.admin.admin', ['admin' => new Admin()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminAdmin $request)
    {
        //dd($request->all());
        //var_dump($request->all());
        //echo "hola mundo".$request->input('title');
        //echo "Hola mundo: ".$request->content;
       /*
       //validación de campos
        $request->validate([
            'title' => 'required | min:5 | max:500',
            'url_clean' => 'required | min:5 | max:400',
            'content' => 'required'
        ]);

        
        //Como acceder cada uno de los valores que le enviaremos en la BD
        $request->title;
        $request->url_clean;
        $request->content;
        */
        //Guardar la informacion en la base de datos 

        Admin::create($request->validated());
        return back()->with('status','Admin Created Sucessfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = Admin::findOrFail($id);
        return view('dashboard.admin.show', ['admin' => $admin]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        return view('dashboard.admin.edit', ['admin' => $admin]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAdminAdmin $request, Admin $admin)
    {
        //Actualizar la información en la base de datos
        $admin->update($request->validated());
        return back()->with('status','Admin updated Sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
        return back()->with('status','Admin deleted Sucessfully');
    }
}