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
                                <th>Descripcion</th>
                                <th>Estado</th>
                                {{--<th>Since</th>--}}
                                {{--<th class="text-right">Salary</th>--}}
                                {{--<th class="text-right">Actions</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($competencias as $competencia)
                                <tr>
                                    <td>{{$competencia->id}}</td>
                                    <td>{{$competencia->descripcion}}</td>
                                    @if($competencia->estado == 1)
                                        <td>Activo</td>
                                    @else
                                        <td>Inactivo</td>
                                    @endif
                                    <td class="td-actions text-right">
                                        <a href="/competencias/{{$competencia->id}}/edit">
                                            <button id="{{$competencia->id}}" type="button" rel="tooltip" class="btn btn-info btn-sm btn-icon">
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
                    <h4 class="card-title">Nuevo competencia</h4>
                    <form id="competenciaNuevo">
                        <div class="form-group" id="divDanger">
                            <label for="descripcion">descripcion competencia</label>
                            <input type="text" class="form-control" id="descripcion" placeholder="descripcion competencia" name="descripcion">
                        </div>
                        <button type="submit" class="btn btn-info animation-on-hover">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom_js')
    <script src="/../assets/js/competencias.js" type="text/javascript"></script>
@endsection