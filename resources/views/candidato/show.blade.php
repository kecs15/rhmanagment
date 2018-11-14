@extends('layouts.default')
@section('contenido')
    <div class="alert alert-danger" id="alert" role="alert" style="display: none">
        <span id="message"></span>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Informacion del candidato {{$candidato->estado}}</h4>
                    <form>
                        <input hidden value="{{$candidato->id}}" id="candidatoID">
                        <div class="form-group form-control">
                            <h6>Informacion Personal</h6>
                            <div class="row">
                                <div class="col">
                                    <label>Nombre: {{$candidato->nombre}}</label>
                                </div>
                                <div class="col">
                                    <label>Cedula: {{$candidato->cedula}}</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label>Sueldo aspira: {{$candidato->salario_aspira}}</label>
                                </div>
                                <div class="col">
                                    <label>Recomendado por: {{$candidato->recomendado}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-control">
                            <h5>Informacion Puesto</h5>
                            <div class="row">
                                <div class="col">
                                    <label>Puesto: {{$candidato->puesto->nombre}}</label>
                                </div>
                                <div class="col">
                                    <label>Departamento: {{$candidato->puesto->departamento->nombre}}</label>
                                </div>
                                <div class="col">
                                    <label>Rango salarial: {{$candidato->puesto->salario_minimo.'-'.$candidato->puesto->salario_maximo}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-control">
                            <h6>Idiomas</h6>
                            @foreach($candidato->idiomas as $idioma)
                                <div class="row">
                                    <div class="col">
                                        <label>Idioma: {{$idioma->nombre}}</label>
                                    </div>
                                    <div class="col">
                                        <label>Nivel: {{$idioma->pivot->nivel}}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="form-group form-control">
                            <h6>Competencias</h6>
                            <div class="row">
                                @foreach($candidato->competencias as $competencia)
                                    <div class="col">
                                        <label>{{$competencia->descripcion}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group form-control">
                            <h6>Capacitaciones</h6>
                            @foreach($candidato->capacitaciones as $capacitacion)
                                <div class="form-group form-control">

                                    <div class="row">
                                        <div class="col">
                                            <label>Desde: {{$capacitacion->desde}}</label>
                                        </div>
                                        <div class="col">
                                            <label>Hasta: {{$capacitacion->hasta}}</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label>Descripcion: {{$capacitacion->descripcion}}</label>
                                        </div>
                                        <div class="col">
                                            <label>Institucion: {{$capacitacion->institucion}}</label>
                                        </div>
                                        <div class="col">
                                            <label>Nivel: {{$capacitacion->nivel}}</label>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="form-group form-control">
                            <h6>Experiencia Laboral</h6>
                            @foreach($candidato->experiencias as $experiencia)
                                <div class="form-group form-control">
                                    <div class="row">
                                        <div class="col">
                                            <label>Desde: {{$experiencia->desde}}</label>
                                        </div>
                                        <div class="col">
                                            <label>Hasta: {{$experiencia->hasta}}</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label>Empresa: {{$experiencia->empresa}}</label>
                                        </div>
                                        <div class="col">
                                            <label>Puesto: {{$experiencia->puesto}}</label>
                                        </div>
                                        <div class="col">
                                            <label>Salario: {{$experiencia->salario}}</label>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @if($candidato->estado == 'Pendiente')

            <div class="col-lg-3 card-chart">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Cambiar Estado</h4>
                        <form id="candidatoEstado">
                            <div class="form-group" id="divDanger">
                                <select class="form-control form-group" name="estado" id="estado">
                                    <option selected value="{{$candidato->estado}}">{{$candidato->estado}}</option>
                                    <option value="Contratado">Contratar</option>
                                    <option value="Rechazado">Rechazar</option>
                                </select>
                                <select class="form-control form-group" name="puesto" id="puesto">
                                    @foreach($puestos as $puesto)
                                        @if($candidato->puesto->id == $puesto->id)
                                            <option selected value="{{$puesto->id}}">{{$puesto->nombre}}</option>
                                        @else
                                            <option value="{{$puesto->id}}">{{$puesto->nombre}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <div class="form-group">
                                    <input type="number" class="form-control" name="salario" id="salario" placeholder="Salario">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info animation-on-hover">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
@section('custom_js')
    <script src="/../assets/js/candidatos.js" type="text/javascript"></script>
@endsection