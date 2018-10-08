@extends('layouts.default')
@section('contenido')
    <div class="alert alert-danger" role="alert" style="display: none">
        <span id="message"></span>
    </div>
    <div class="row">
        <div class="col-lg-6">
            @isset($departamentos)
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Listado de Departamentos</h4>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Estado</th>
                                {{--<th>Since</th>--}}
                                {{--<th class="text-right">Salary</th>--}}
                                {{--<th class="text-right">Actions</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($departamentos as $departamento)
                                <tr>
                                    <td>{{$departamento->id}}</td>
                                    <td>{{$departamento->nombre}}</td>
                                    @if($departamento->estado == 1)
                                        <td>Activo</td>
                                    @else
                                        <td>Inactivo</td>
                                    @endif
                                    <td class="td-actions text-right">
                                        <a href="/departamentos/{{$departamento->id}}/edit">
                                            <button id="{{$departamento->id}}" type="button" rel="tooltip" class="btn btn-info btn-sm btn-icon">
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
                    <h4 class="card-title">Nuevo departamento</h4>
                    <form id="departamentoNuevo">
                        <div class="form-group" id="divDanger">
                            <label for="nombre">Nombre departamento</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Nombre departamento" name="nombre">
                        </div>
                        <button type="submit" class="btn btn-info animation-on-hover">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom_js')
    <script src="/../assets/js/departamentos.js" type="text/javascript"></script>
@endsection