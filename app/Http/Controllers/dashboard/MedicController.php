<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;    
use App\Http\Requests\StoreMedicMedic;
use App\Models\Medic;


class MedicController extends Controller
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
        $medics = Medic::orderBy('created_at','desc')->paginate(10);//select * from post order by created_at DESC;
        
        return view('dashboard.medic.index', ['medics'=>$medics]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.medic.medic', ['medic' => new Medic()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMedicMedic $request)
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

        Medic::create($request->validated());
        return back()->with('status','Medic Created Sucessfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $medic = Medic::findOrFail($id);
        return view('dashboard.medic.show', ['medic' => $medic]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Medic $medic)
    {
        return view('dashboard.medic.edit', ['medic' => $medic]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreMedicMedic $request, Medic $medic)
    {
        //Actualizar la información en la base de datos
        $medic->update($request->validated());
        return back()->with('status','Medic updated Sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medic $medic)
    {
        $medic->delete();
        return back()->with('status','Medic deleted Sucessfully');
    }
}