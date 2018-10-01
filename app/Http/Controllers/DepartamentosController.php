<?php

namespace App\Http\Controllers;

use App\Departamento;
use Illuminate\Http\Request;

class DepartamentosController extends Controller
{
    private $responseError = ['status' => 'error', 'message' => 'Este departamento ya existe'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Departamento $departamentos)
    {
        return view('departamento.index')->with(['departamentos' => $departamentos->all()]);
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
        $departamento = new Departamento();
        $departamentoEncontrado = $departamento->where('nombre', $request->nombre)->value('nombre');

        if(isset($departamentoEncontrado)) {
            return response()->json($this->responseError);
        }

        $departamento->nombre = $request->nombre;
        $departamento->save();
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
        $departamento = new Departamento();
        $departamentos = $departamento;
        return view('departamento.edit')->with(['departamentos' => $departamentos->all(), 'departamento' => $departamento->find($id)]);
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
        $departamento = new Departamento();
        $departamentoEncontrado= $departamento->where('nombre', $request->nombre)
            ->where('id', '<>', $id)->first();

        if(isset($departamentoEncontrado)) {
            return response()->json($this->responseError);
        }
        $departamento->find($id)->update(['nombre' => $request->nombre, 'estado' => $request->estado]);
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
