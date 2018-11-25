@extends('layouts.default')
@section('contenido')
    <div class="alert alert-danger" role="alert" style="display: none">
        <span id="message"></span>
    </div>
    <div class="row">
        <div class="col-lg-8">
            @isset($empleados)
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Listado de Empleados</h4>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Puesto</th>
                                <th>Salario</th>
                                <th>Ingreso</th>
                                <th>Estado</th>
                                {{--<th>Since</th>--}}
                                {{--<th class="text-right">Salary</th>--}}
                                {{--<th class="text-right">Actions</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($empleados as $empleado)
                                <tr>
                                    <td>{{$empleado->id}}</td>
                                    <td>{{$empleado->nombre}}</td>
                                    <td>{{$empleado->puesto->nombre}}</td>
                                    <td>{{$empleado->salario}}</td>
                                    <td>{{$empleado->created_at}}</td>
                                    <td>{{$empleado->estado}}</td>
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