<?php

namespace App\Http\Controllers;

use App\Candidato;
use App\Competencia;
use App\Idioma;
use Illuminate\Http\Request;
use App\Puesto;

class CandidatosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Puesto $puesto, Idioma $idiomas, Competencia $competencias,  $puestoID)
    {
        return view('candidato.create')->with(['puesto' => $puesto->find($puestoID),
                                                     'idiomas' => $idiomas->where('estado', 1)->get(),
                                                     'competencias' => $competencias->where('estado', 1)->get()
                                                    ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $candidato = new Candidato;

        $candidato->nombre = $request->nombreCandidato;
        $candidato->cedula = $request->cedula;
        $candidato->salario_aspira = $request->salarioAspira;
        $candidato->save();

        foreach($request->idiomas as $k => $idioma)
        {
            if($idioma != '0' && $request->idiomaNiveles[$k] != '0')
            {
                $candidato->idiomas()->attach($idioma, ['nivel' => $request->idiomaNiveles[$k]]);
            }
        }

        if($request->competencias != null)
        {
            foreach($request->competencias as $competencia)
            {
                $candidato->competencias()->attach($competencia);
            }
        }
        var_dump($request->competencias);
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
        //
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
