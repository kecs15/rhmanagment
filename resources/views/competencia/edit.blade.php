@extends('layouts.default')
@section('contenido')
    <div class="alert alert-danger" role="alert" style="display: none">
        <span id="message"></span>
    </div>
    <div class="row">
        <div class="col-lg-6">
            @isset($competencias)
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Listado de competencias</h4>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>descripcion</th>
                                <th>Estado</th>
                                {{--<th>Since</th>--}}
                                {{--<th class="text-right">Salary</th>--}}
                                {{--<th class="text-right">Actions</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($competencias as $v)
                                <tr>
                                    <td>{{$v->id}}</td>
                                    <td>{{$v->descripcion}}</td>
                                    @if($v->estado == 1)
                                        <td>Activo</td>
                                    @else
                                        <td>Inactivo</td>
                                    @endif
                                    <td class="td-actions text-right">
                                        <a href="/competencias/{{$v->id}}/edit">
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
                    <h4 class="card-title">Editar competencia</h4>
                    <form id="editarCompetencia">
                        <input id="competenciaID" hidden value="{{$competencia->id}}" name="competenciaID">
                        <div class="form-group" id="divDanger">
                            <label for="descripcion">descripcion competencia</label>
                            <input id="descripcion" type="text" class="form-control" name="descripcion" placeholder="descripcion competencia" value="{{$competencia->descripcion}}">
                        </div>
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <select class="form-control" id="estado" name="estado">
                                @if($competencia->estado == 1)
                                    <option value="0">Inactivo</option>
                                    <option selected value="{{$competencia->estado}}">Activo</option>
                                @else
                                    <option value="1">Activo</option>
                                    <option selected value="{{$competencia->estado}}">Inactivo</option>
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
    <script src="/../assets/js/competencias.js" type="text/javascript"></script>
@endsection