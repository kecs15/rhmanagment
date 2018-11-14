@extends('layouts.default')
@section('contenido')
    <div class="alert alert-danger" id="alert" role="alert" style="display: none">
        <span id="message"></span>
    </div>
    <div class="container">
        <div class="col-lg-10">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Aplicando para {{$puesto->nombre}}</h4>
                        <form id="candidato">
                            <input type="hidden" name="puesto_id" value="{{$puesto->id}}">
                            <div class="form-group" id="divDangerNombre">
                                <label for="nombre">Nombre completo</label>
                                <input type="text" class="form-control" id="nombre" placeholder="Nombre completo" name="nombreCandidato">
                            </div>
                            <div class="row">
                                <div class="col" id="divDangerCedula">
                                    <label for="nombre">Cedula</label>
                                    <input type="number" class="form-control" id="cedula" placeholder="Cedula" name="cedula">
                                </div>
                                <div class="col" id="divDangerSalario">
                                    <label for="nombre">Salario al que aspira</label>
                                    <input type="number" class="form-control" id="salario" placeholder="Salario aspirante" name="salarioAspira">
                                </div>
                                <div class="col" id="divDangerRecomendacion">
                                    <label for="nombre">Recomendado por</label>
                                    <input type="text" class="form-control" id="recomendado" placeholder="Recomendado por" name="recomendado">
                                </div>
                            </div>
                            <div class="form-control form-group" id="idiomas">
                                <h5 class="card-title">Idiomas</h5>
                                <button type="button" class="btn btn-info animation-on-hover" id="agregarIdioma">Añadir Idioma</button>
                                <div class="row" id="idiomaDivRow">
                                    <div class="col">
                                        <label for="idioma">Idioma</label>
                                        <select name="idiomas[]" class="form-control">
                                            <option value="0" selected>Seleccionar Idioma</option>
                                            @foreach($idiomas as $idioma)
                                                <option value="{{$idioma->id}}">{{$idioma->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="nivel">Nivel</label>
                                        <select name="idiomaNiveles[]" class="form-control">
                                            <option value="0" selected>Seleccionar Nivel</option>
                                            <option value="Bajo" >Bajo</option>
                                            <option value="Medio" >Medio</option>
                                            <option value="Alto" >Alto</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-control" id="competencias">
                                <h5 class="card-title">Competencias</h5>
                                @foreach($competencias as $competencia)
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="competencias[]" value="{{$competencia->id}}">{{$competencia->descripcion}}
                                            <span class="form-check-sign"></span>
                                        </label>
                                    </div>
                                    @endforeach
                            </div>
                            <div class="form-group form-control" id="capacitaciones">
                                <h5 class="card-title">Capacitaciones</h5>
                                <button type="button" class="btn btn-info animation-on-hover" id="agregarCapacitacion">Añadir Capacitacion</button>
                                <div id="capacitacion" class="form-control">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="descripcion">Descripcion</label>
                                                <input type="text" class="form-control" name="capacitacionDescripciones[]" placeholder="Descripcion de la capacitacion">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="nivel">Nivel</label>
                                                <input type="text" class="form-control" name="capacitacionNiveles[]" placeholder="Nivel de la capacitacion">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="desde">Desde</label>
                                            <input type="date" class="form-control fecha-desde" name="capacitacionFechasDesde[]">
                                        </div>
                                        <div class="col">
                                            <label for="hasta">Hasta</label>
                                            <input type="date" class="form-control fecha-hasta" name="capaciacionFechasHasta[]">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="institucion">Institucion</label>
                                        <input type="text" class="form-control" name="capacitacionInstituciones[]" placeholder="Nombre de la institucion">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-control" id="experienciasLaborales">
                                <h5 class="card-title">Experiencia Laboral</h5>
                                <button type="button" class="btn btn-info animation-on-hover" id="agregarExperiencia">Añadir Experiencia</button>
                                <div id="experienciaLaboral" class="form-control">
                                    <div class="form-group" id="divDangerEmpresa">
                                        <label for="nombreEmpresa">Empresa</label>
                                        <input type="text" class="form-control" id="nombreEmpresa1" name="nombreEmpresas[]" placeholder="Nombre de la empresa">
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="posicion">Posicion</label>
                                            <input type="text" class="form-control" name="posiciones[]" placeholder="Posicion">
                                        </div>
                                        <div class="col">
                                            <label for="salario">Salario</label>
                                            <input type="number" class="form-control" name="experienciaSalarios[]" placeholder="Salario">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="desde">Desde</label>
                                            <input type="date" class="form-control fecha-desde" name="experienciaFechasDesde[]">
                                        </div>
                                        <div class="col">
                                            <label for="salario">Hasta</label>
                                            <input type="date" class="form-control fecha-hasta" name="experienciasFechasHaste[]">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-info animation-on-hover">Guardar</button>
                        </form>
                    </div>
                </div>
        </div>
    </div>
@endsection
@section('custom_js')
    <script src="/../assets/js/candidatos.js" type="text/javascript"></script>
@endsection