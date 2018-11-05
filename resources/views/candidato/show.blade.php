@extends('layouts.default')
@section('contenido')
    <div class="container">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Informacion del candidato</h4>
                    <form>
                        <div class="form-group form-control">
                            <div class="row">
                                {{--<h5 class="card-title">Informacion Personal</h5>--}}
                                <div class="col">
                                    <label>Nombre: {{$candidato->nombre}}</label>
                                </div>
                                <div class="col">
                                    <label>Cedula: {{$candidato->cedula}}</label>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom_js')
    <script src="/../assets/js/idiomas.js" type="text/javascript"></script>
@endsection