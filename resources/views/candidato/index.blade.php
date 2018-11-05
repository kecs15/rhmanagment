@extends('layouts.default')
@section('contenido')
    <div class="alert alert-danger" role="alert" style="display: none">
        <span id="message"></span>
    </div>
    <div class="row">
        <div class="col-lg-8">
            @isset($candidatos)
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Listado de Candidatos</h4>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Estado</th>
                                <th>Puesto</th>
                                {{--<th class="text-right">Salary</th>--}}
                                {{--<th class="text-right">Actions</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($candidatos as $candidato)
                                <tr>
                                    <td>{{$candidato->id}}</td>
                                    <td>{{$candidato->nombre}}</td>
                                    <td>{{$candidato->estado}}</td>
                                    <td>{{$candidato->puesto->nombre}}</td>
                                    <td class="td-actions text-right">
                                        <a href="/candidatos/{{$candidato->id}}">
                                            <button id="{{$candidato->id}}" type="button" rel="tooltip" class="btn btn-info btn-sm btn-icon">
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
    </div>
@endsection
@section('custom_js')
    <script src="/../assets/js/idiomas.js" type="text/javascript"></script>
@endsection