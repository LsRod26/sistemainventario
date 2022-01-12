@extends('layout')

@section('titulo','Registrar nuevo tipo de componente')

@section('contenido')

    <div class="row">
        <div class="col-12 col-sm-10 col-lg-6 mx-auto">
            <h1 class="display-4">Registrar un tipo de componente</h1>
            <form class="bg-white shadow rounded py-3 px-2" method="POST" enctype="multipart/form-data" action="{{route('tipocomponente.store')}}">
                @csrf
                <div class="form-group">
                    <label>Tipo de Componente</label>
                    <br>
                    <input class="form-control bg-light shadow-sm" type="text" name="nombretipocomponente">
                </div>
                <div>
                    <br>
                    <button class="btn btn-primary btn-lg btn-block">Guardar</button>
                </div>
            </form>
        </div>
    </div>
    
@endsection