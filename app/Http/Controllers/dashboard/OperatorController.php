<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;    
use App\Http\Requests\StoreOperatorOperator;
use App\Models\Operator;


class OperatorController extends Controller
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
        $operators = Operator::orderBy('created_at','desc')->paginate(10);//select * from post order by created_at DESC;
        
        return view('dashboard.operator.index', ['operators'=>$operators]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.operator.operator', ['operator' => new Operator()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOperatorOperator $request)
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

        Operator::create($request->validated());
        return back()->with('status','Operator Created Sucessfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $operator = Operator::findOrFail($id);
        return view('dashboard.operator.show', ['operator' => $operator]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Operator $operator)
    {
        return view('dashboard.operator.edit', ['operator' => $operator]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreOperatorOperator $request, Operator $operator)
    {
        //Actualizar la información en la base de datos
        $operator->update($request->validated());
        return back()->with('status','Operator updated Sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Operator $operator)
    {
        $operator->delete();
        return back()->with('status','Operator deleted Sucessfully');
    }
}