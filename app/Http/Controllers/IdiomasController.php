<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Idioma;

class IdiomasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Idioma $idiomas)
    {
        return view('idioma.index')->with(['idiomas' => $idiomas->all()]);
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
        $idioma = new Idioma();
        $idioma->nombre = $request->nombre;
        $idioma->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $idioma = new Idioma();
        $idiomas = new Idioma();
        return view('idioma.edit')->with(['idiomas' => $idiomas->all(), 'idioma' => $idioma->find($id)]);
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
        $idioma = new Idioma();
        $idioma->find($id);
        $idioma->find($id)->update(['nombre' => $request->nombre, 'estado' => $request->estado]);
        return view('idioma.index')->with(['idiomas' => $idioma->all()]);
//        $idioma->nombre = $request->nombre;
//        $idioma->estado = $request->estado;
//        $idioma->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
