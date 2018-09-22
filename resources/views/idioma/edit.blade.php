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
                            @foreach($idiomas as $v)
                                <tr>
                                    <td>{{$v->id}}</td>
                                    <td>{{$v->nombre}}</td>
                                    @if($v->estado == 1)
                                        <td>Activo</td>
                                    @else
                                        <td>Inactivo</td>
                                    @endif
                                    <td class="td-actions text-right">
                                        <a href="/idiomas/{{$v->id}}/edit">
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
                    <h4 class="card-title">Editar idioma</h4>
                    <form id="editarIdioma">
                        <input id="idiomaID" hidden value="{{$idioma->id}}" name="idiomaID">
                        <div class="form-group">
                            <label for="nombre">Nombre idioma</label>
                            <input type="text" class="form-control" name="nombre" placeholder="Nombre idioma" value="{{$idioma->nombre}}">
                        </div>
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <select class="form-control" id="estado" name="estado">
                                @if($idioma->estado == 1)
                                    <option value="0">Inactivo</option>
                                    <option selected value="{{$idioma->estado}}">Activo</option>
                                @else
                                    <option value="1">Activo</option>
                                    <option selected value="{{$idioma->estado}}">Inactivo</option>
                                @endif
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info animation-on-hover">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom_js')
    <script src="/../assets/js/idiomas.js" type="text/javascript"></script>
    <script type="text/javascript">
        //        function editarIdioma(target){
        //            window.location.href = 'http://localhost:8000/idiomas/edit/'+target.id;
        //
        //        }
    </script>
@endsection