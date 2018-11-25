<?php

namespace App\Http\Controllers;

use App\Candidato;
use App\Competencia;
use App\Exports\CandidatosExport;
use App\Idioma;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Puesto;
use App\Empleado;
use Maatwebsite\Excel\Facades\Excel;
use DB;


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
        $candidato->recomendado = $request->recomendado;
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
        $puestos = new Puesto();
//        var_dump($candidato->idiomas[0]->pivot->nivel);die;
        return view('candidato.show')->with(['candidato' => $candidato, 'puestos' => $puestos->where('estado', 1)->get()]);
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
        $candidato = Candidato::find($id);

        if($request->estado == 'Contratado') {
            $empleado = new Empleado();
            $empleado->nombre = $candidato->nombre;
            $empleado->cedula = $candidato->cedula;
            $empleado->salario = $request->salario;
            $empleado->puesto_id = $request->puesto;
            $empleado->candidato_id = $candidato->id;
            $empleado->estado ='Activo';
            $candidato->estado = $request->estado;
            $candidato->save();
            $empleado->save();
            return response()->json(['status' => 'hired', 'message' => 'El emplado ha sido contratado.']);
        }elseif ($request->estado == 'Rechazado') {
            $candidato->estado = $request->estado;
            $candidato->save();
            return response()->json(['status' => 'rejected', 'message' => 'El emplado ha sido rechazado.']);
        }
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

    public function find(Request $request)
    {
        $criterio =  null;

        switch ($request->criterio) {
            case 'idiomas':
                $criterio = 'idiomas.nombre';
                break;

            default:
                $criterio = 'competencias.descripcion';
                break;
        }

        $candidatos = DB::table('candidatos')
                                ->join('puestos', 'candidatos.puesto_id', '=', 'puestos.id')
                                ->join('candidato_idioma', 'candidatos.id', '=', 'candidato_idioma.candidato_id')
                                ->join('idiomas', 'candidato_idioma.idioma_id', '=', 'idiomas.id')
                                ->join('candidato_competencia', 'candidatos.id', '=', 'candidato_competencia.candidato_id')
                                ->join('competencias', 'candidato_competencia.competencia_id', '=', 'competencias.id')
                                ->select('candidatos.*', 'puestos.nombre as puesto_nombre')
                                ->where($criterio, '=', $request->valor)
                                ->groupBy('candidatos.id')
                                ->get();

        return view('candidato.index')->with(['candidatos' => $candidatos]);
    }

    public function export()
    {
        return Excel::download(new CandidatosExport, 'candidatos.xlsx');
    }
}
