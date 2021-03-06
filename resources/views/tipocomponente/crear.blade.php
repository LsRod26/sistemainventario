@extends('layout')

@section('titulo','Registrar nuevo tipo de componente')

@section('contenido')

    <div class="container mt-5">
        <div class="col-8">
            <h1 class="display-4">Registrar un tipo de componente</h1>
            <form method="POST" enctype="multipart/form-data" action="{{route('tipocomponente.store')}}">
                @csrf
                <div class="form-group mt-4">
                    <label>Tipo de Componente</label>
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