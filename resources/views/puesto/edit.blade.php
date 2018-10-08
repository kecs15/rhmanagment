@extends('layouts.default')
@section('contenido')
    <div class="alert alert-danger" role="alert" style="display: none">
        <span id="message"></span>
    </div>
    <div class="row">
        <div class="col-lg-6">
            @isset($puestos)
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Listado de puestos</h4>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Departamento</th>
                                <th>Nivel</th>
                                <th>Estado</th>
                                {{--<th class="text-right">Salary</th>--}}
                                {{--<th class="text-right">Actions</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($puestos as $v)
                                <tr>
                                    <td>{{$v->id}}</td>
                                    <td>{{$v->nombre}}</td>
                                    <td>{{$v->departamento->nombre}}</td>
                                    @switch($v->nivel_riesgo)
                                        @case(1)
                                            <td>Medio</td>
                                            @break
                                        @case(2)
                                            <td>Alto</td>
                                            @break
                                        @default
                                            <td>Bajo</td>
                                    @endswitch
                                    @if($v->estado == 1)
                                        <td>Activo</td>
                                    @else
                                        <td>Inactivo</td>
                                    @endif
                                    <td class="td-actions text-right">
                                        <a href="/puestos/{{$v->id}}/edit">
                                            <button id="{{$v->id}}" type="button" rel="tooltip" class="btn btn-info btn-sm btn-icon">
                                                <i class="tim-icons icon-pencil"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                            @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
        
        <div class="col-lg-3 card-chart">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Nuevo puesto</h4>
                    <form id="puestoEditar">
                    <input type="hidden" value="{{$puesto->id}}" id="puestoID">
                        <div class="form-group" id="divDanger">
                            <label for="nombre">Nombre puesto</label>
                        <input type="text" class="form-control" id="nombre" placeholder="Nombre puesto" name="nombre" value="{{$puesto->nombre}}">
                        </div>
                        <div class="form-group">
                                <label for="nivel">Nivel de riesgo</label>
                                <select class="form-control" id="nivel" name="nivel">
                                    @switch($puesto->nivel)
                                        @case(1)
                                            <option value="0">Bajo</option>
                                            <option value="1" selected>Medio</option>
                                            <option value="2">Alto</option>    
                                            @break
                                        @case(2)
                                            <option value="0">Bajo</option>
                                            <option value="1">Medio</option>
                                            <option value="2" selected>Alto</option>
                                            @break
                                        @default
                                            <option value="0" selected>Bajo</option>
                                            <option value="1">Medio</option>
                                            <option value="2">Alto</option>
                                    @endswitch
                                        
                                </select>        
                        </div>
                        <div class="form-group">
                            <label for="departamento">Departamento</label>
                            <select class="form-control" id="departamento" name="departamento">
                                @foreach($departamentos as $departamento)
                                    @if($departamento->id == $puesto->departamento->id)
                                        <option value="{{$departamento->id}}" selected>{{$departamento->nombre}}</option>
                                    @else
                                        <option value="{{$departamento->id}}">{{$departamento->nombre}}</option>
                                    @endif
                                @endforeach
                            </select>        
                        </div>
                        <div class="form-group" id="divDangerSalarioMin">
                                <label for="salarioMin">Salario minimo</label>
                        <input type="number" class="form-control" id="salarioMin" name="salarioMin" value="{{$puesto->salario_minimo}}">
                        </div>
                        <div class="form-group" id="divDangerSalarioMax">
                                <label for="nombre">Salario maximo</label>
                                <input type="number" class="form-control" id="salarioMax" name="salarioMax" value="{{$puesto->salario_maximo}}">
                        </div>
                        <div class="form-group">
                                <label for="estado">Estado</label>
                                <select class="form-control" id="estado" name="estado">
                                    @if($puesto->estado == 1)
                                        <option value="0">Inactivo</option>
                                        <option selected value="{{$puesto->estado}}">Activo</option>
                                    @else
                                        <option value="1">Activo</option>
                                        <option selected value="{{$puesto->estado}}">Inactivo</option>
                                    @endif
                                </select>
                            </div>
                        <button type="submit" class="btn btn-info animation-on-hover">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom_js')
    <script src="/../assets/js/puestos.js" type="text/javascript"></script>
@endsection