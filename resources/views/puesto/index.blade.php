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
                            @foreach($puestos as $puesto)
                                <tr>
                                    <td>{{$puesto->id}}</td>
                                    <td>{{$puesto->nombre}}</td>
                                    <td>{{$puesto->departamento->nombre}}</td>
                                    @switch($puesto->nivel_riesgo)
                                        @case(1)
                                            <td>Medio</td>
                                            @break
                                        @case(2)
                                            <td>Alto</td>
                                            @break
                                        @default
                                            <td>Bajo</td>
                                    @endswitch
                                    @if($puesto->estado == 1)
                                        <td>Activo</td>
                                    @else
                                        <td>Inactivo</td>
                                    @endif
                                    <td class="td-actions text-right">
                                        <a href="/puestos/{{$puesto->id}}/edit">
                                            <button id="{{$puesto->id}}" type="button" rel="tooltip" class="btn btn-info btn-sm btn-icon">
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
                    <form id="puestoNuevo">
                        <div class="form-group" id="divDanger">
                            <label for="nombre">Nombre puesto</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Nombre puesto" name="nombre">
                        </div>
                        <div class="form-group">
                                <label for="nivel">Nivel de riesgo</label>
                                <select class="form-control" id="nivel" name="nivel">
                                        <option value="0">Bajo</option>
                                        <option value="1">Medio</option>
                                        <option value="2">Alto</option>
                                </select>        
                        </div>
                        <div class="form-group">
                            <label for="departamento">Departamento</label>
                            <select class="form-control" id="departamento" name="departamento">
                                @foreach($departamentos as $departamento)
                                    <option value="{{$departamento->id}}">{{$departamento->nombre}}</option>
                                @endforeach
                            </select>        
                        </div>
                        <div class="form-group" id="divDangerSalarioMin">
                                <label for="salarioMin">Salario minimo</label>
                                <input type="number" class="form-control" id="salarioMin" name="salarioMin">
                        </div>
                        <div class="form-group" id="divDangerSalarioMax">
                                <label for="nombre">Salario maximo</label>
                                <input type="number" class="form-control" id="salarioMax" name="salarioMax">
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