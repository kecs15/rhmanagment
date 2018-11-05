<?php

namespace App\Http\Controllers;

use App\Candidato;
use App\Competencia;
use App\Idioma;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Puesto;

class CandidatosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Candidato $candidato)
    {
        return view('candidato.index')->with(['candidatos' => $candidato->all()]);
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
        $candidato->puesto_id = $request->puesto_id;
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

        foreach ($request->capacitacionDescripciones as $k => $v)
        {
//                var_dump($request->capacitacionDescripciones[$k]);
            if($request->capaciotancionDescripciones[$k] != null
                || $request->capacitacionInstituciones[$k] != null
                || $request->capacitacionNiveles[$k] != null)
            {
                $candidato->capacitaciones()->create([
                    'descripcion' => $request->capacitacionDescripciones[$k],
                    'institucion' => $request->capacitacionInstituciones[$k],
                    'nivel' => $request->capacitacionNiveles[$k],
                    'desde' => $request->capacitacionFechasDesde[$k],
                    'hasta' => $request->capacitacionFechasHasta[$k]
                ]);
            }
        }

        foreach ($request->nombreEmpresas as $k => $v)
        {
            if($request->nombreEmpresas[$k] != null
                || $request->posiciones[$k] !=null
                || $request->experienciaSalarios[$k] != null)
            {
                $candidato->experiencias()->create([
                    'empresa' => $request->nombreEmpresas[$k],
                    'puesto'  => $request->posiciones[$k],
                    'salario' => $request->experienciaSalarios[$k],
                    'desde' => $request->experienciaFechasDesde[$k],
                    'hasta' => $request->experienciaFechasHasta[$k]
                ]);
            }
        }

        return response()->json(['status' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $candidato = Candidato::find($id);
        //var_dump($candidato->idiomas[0]->nombre);die;
        return view('candidato.show')->with(['candidato' => $candidato]);
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
