<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Trabajador;

class SmileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //return Nota::where('user_id', auth()->id())->get();
        // if($request->ajax()){
        //     return Trabajador::all();
        // }else{
        //     return view('home');
        // }
        return Trabajador::orderBy('salario','DESC')->get();
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
        $trabajador = new Trabajador();
        $trabajador->nombres = $request->nombreCompleto;
        $trabajador->salario = $request->salario;
        $trabajador->estado = $request->estado;
        $trabajador->cargo = $request->cargo;
        $trabajador->correo = $request->email;
        $trabajador->save();

        return $trabajador;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Trabajador::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $trabajador = Trabajador::find($id);
        $trabajador->nombres = $request->nombreCompleto;
        $trabajador->salario = $request->salario;
        $trabajador->estado = $request->estado;
        $trabajador->cargo = $request->cargo;
        $trabajador->correo = $request->email;
        
        $trabajador->save();
        return $trabajador;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trabajador = Trabajador::find($id);
        $trabajador->delete();
    }
   
}
