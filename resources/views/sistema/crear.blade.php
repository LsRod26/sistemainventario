@extends('layout')

@section('titulo','Registrar un nuevo sistema')

@section('contenido')

<div class="row">
    <div class="col-12 col-sm-10 col-lg-6 mx-auto">
        <h1 class="display-4">
            Registrar un nuevo sistema
        </h1>
        <form class="bg-white shadow rounded py-3 px-2" method="POST" enctype="multipart/form-data" action="{{route('sistema.store')}}">
            @csrf
            <div class="form-group">
                <label> Nombre del sistema</label>
                <br>
                <input class="form-control bg-light shadow-sm" type="text" name="nombresistema">
            </div>
            <br>
            <div class="form-group">
                <button> Guardar</button>
            </div>
        </form>
    </div>
</div>
    
@endsection

