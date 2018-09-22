@extends('layouts.default')
@section('contenido')
    <div class="row">
        <div class="col-lg-6">
            @isset($idiomas)
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Listado de Idiomas</h4>
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
                            @foreach($idiomas as $idioma)
                                <tr>
                                    <td>{{$idioma->id}}</td>
                                    <td>{{$idioma->nombre}}</td>
                                    @if($idioma->estado == 1)
                                        <td>Activo</td>
                                    @else
                                        <td>Inactivo</td>
                                    @endif
                                    <td class="td-actions text-right">
                                        <a href="/idiomas/{{$idioma->id}}/edit">
                                            <button id="{{$idioma->id}}" type="button" rel="tooltip" class="btn btn-info btn-sm btn-icon">
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
                    <h4 class="card-title">Nuevo idioma</h4>
                    <form id="idioma">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="nombre">Nombre idioma</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Nombre idioma" name="nombre">
                        </div>
                        <button type="submit" class="btn btn-info animation-on-hover">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom_js')
    <script src="/../assets/js/idiomas.js" type="text/javascript"></script>
@endsection