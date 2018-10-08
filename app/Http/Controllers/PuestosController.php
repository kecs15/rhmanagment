<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Puesto;
use App\Departamento;

class PuestosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Puesto $puesto, Departamento $departamento)
    {
        return view('puesto.index')->with(['puestos' => $puesto->all(),
                                           'departamentos' => $departamento->where('estado', 1)->get()
                                        ]);
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
        $puesto = new Puesto;
        $puesto->nombre = $request->nombre;
        $puesto->nivel_riesgo = $request->nivel;
        $puesto->salario_minimo = $request->salarioMin;
        $puesto->salario_maximo = $request->salarioMax;
        $puesto->departamento_id = $request->departamento;
        $puesto->save();
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
        $puesto = new Puesto;
        $departamento = new Departamento;
        
        return view('puesto.edit')->with(['puestos' => $puesto->all(),
                                           'departamentos' => $departamento->where('estado', 1)->get(),
                                           'puesto' => $puesto->find($id)->first()
                                        ]);
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
        $puesto = new Puesto();

        $puesto->find($id)->update([
            'nombre' => $request->nombre,
            'nivel_riesgo' => $request->nivel,
            'salario_minimo' => $request->salarioMin,
            'salario_maximo' => $request->salarioMax,
            'estado' => $request->estado,
            'departamento_id' => $request->departamento
        ]);
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

    public function PuestosDisponibles(Puesto $puesto)
    {
        return view('puesto.disponibles')->with(['puestos' => $puesto->where('estado', 1)->get()]);
    }
}
