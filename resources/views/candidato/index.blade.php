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
                                    @if(isset($candidato->puesto_nombre))
                                        <td>{{$candidato->puesto_nombre}}</td>
                                    @else
                                        <td>{{$candidato->puesto->nombre}}</td>
                                    @endif
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
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
        <div class="col-lg-3 card-chart">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Busqueda</h4>
                    <form id="buscarCandidatos" method="POST" action="/candidatos/find">
                        <div class="form-group">
                            <label for="nombre">Nombre idioma</label>
                            <select class="form-control" id="criterio" name="criterio">
                                <option value="idiomas">Idioma</option>
                                <option value="competencias">Competencia</option>
                            </select>
                        </div>
                        <div class="form-group" id="divDanger">
                            <label for="valor">Valor</label>
                            <input type="text" class="form-control" name="valor" id="valor" placeholder="Valor a buscar" required>
                        </div>
                        <button type="submit" class="btn btn-info animation-on-hover">Buscar</button>
                        <a href="/candidatos/export">
                            <button id="{{$candidato->id}}" type="button" rel="tooltip" class="btn btn-info animation-on-hover">
                                Exportar
                            </button>
                        </a>
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