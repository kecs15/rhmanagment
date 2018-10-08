@extends('layouts.default')
@section('contenido')
    <div class="alert alert-danger" role="alert" style="display: none">
        <span id="message"></span>
    </div>
    <div class="container">
        <div class="col-lg-8">
            @isset($puestos)
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Listado de puestos</h4>
                        <table class="table">
                            <thead>
                            <tr>
                                {{-- <th>ID</th> --}}
                                <th>Nombre</th>
                                <th>Rango salarial</th>
                                <th>Departamento</th>
                                {{-- <th>Nivel</th> --}}
                                {{-- <th>Estado</th> --}}
                                {{--<th class="text-right">Salary</th>--}}
                                {{--<th class="text-right">Actions</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($puestos as $puesto)
                                <tr>
                                    {{-- <td>{{$puesto->id}}</td> --}}
                                    <td>{{$puesto->nombre}}</td>
                                    <td>{{$puesto->salario_minimo."-".$puesto->salario_maximo}}</td>
                                    <td>{{$puesto->departamento->nombre}}</td>
                                    {{-- @switch($puesto->nivel_riesgo)
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
                                    @endif --}}
                                    <td class="td-actions text-right">
                                        <a href="/candidatos/{{$puesto->id}}/create">
                                            <button id="{{$puesto->id}}" type="button" rel="tooltip" class="btn btn-info animation-on-hover">
                                                Aplicar
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

    </div>
@endsection
@section('custom_js')
    <script src="/../assets/js/puestos.js" type="text/javascript"></script>
@endsection