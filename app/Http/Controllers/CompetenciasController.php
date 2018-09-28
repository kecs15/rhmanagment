<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Competencia;
class CompetenciasController extends Controller
{
    private $responseError = ['status' => 'error', 'message' => 'Esta competencia ya existe.'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Competencia $competencia)
    {
        return view('competencia.index')->with(['competencias' => $competencia->all()]);
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
    public function store(Request $request, Competencia $competencia)
    {
      $competenciaEncontrada = $competencia->where('descripcion', $request->descripcion)->first();

      if(isset($competenciaEncontrada)) {
          return response()->json($this->responseError);
      }

      $competencia->descripcion = $request->descripcion;
      $competencia->save();
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
        $competencia = new Competencia();
        $competencias = $competencia;
        return view('competencia.edit')->with(['competencia' => $competencia->find($id),
                                               'competencias' => $competencias->all()]);
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
        $competencia = new Competencia();
        $competenciaEncontrada = $competencia->where('descripcion', $request->descripcion)
                                             ->where('id', '<>', $id)->first();

        if(isset($competenciaEncontrada)) {
            return response()->json($this->responseError);
        }
        
        $competencia->find($id)->update(['descripcion' => $request->descripcion, 'estado' => $request->estado]);
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
