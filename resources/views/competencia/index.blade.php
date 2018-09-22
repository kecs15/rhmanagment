@extends('layouts.default')
@extends('layouts.navbar')
@extends('layouts.sidebar')
@section('contenido')
    <div class="card" style="width: 20rem;">
        <div class="card-body">
            <h4 class="card-title">Nuevo idioma</h4>
            <form id="idioma">
                <div class="form-group">
                    <label for="nombre">Nombre idioma</label>
                    <input type="text" class="form-control" id="nombre" placeholder="Nombre idioma">
                </div>
                <button type="submit" class="btn btn-info animation-on-hover">Submit</button>
            </form>
        </div>
    </div>

@endsection
@section('custom_js')
    <script src="assets/js/idiomas.js"></script>
@endsection