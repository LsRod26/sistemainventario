@extends('layout')

@section('titulo','Registrar un equipo')

@section('contenido')

<div class="container mt-5">
    <div class="col-8">
        <h1 class='display-4'> Registre un equipo en el sistema</h1>
        <form  method="POST" enctype="multipart/form-data" action="{{route('equipo.store')}}">
            @csrf
            <div class="form-group">
                <label>Nombre Equipo</label>
                <br>
                <input class="form-control bg-light shadow-sm" type="text" name="nombreequipo"> 
            </div>
            <br>
            <div class="form-group">
                <label>Tipo de equipo</label>
                <br>
                <select name="tipoequipo" class=" form-select bg-light shadow-sm">
                    <option value="">Seleccione una opción</option>
                    <option value="PC">PC</option>
                    <option value="LAPTOP">Laptop</option>
                </select>
            </div>
            <br>
            <div class="form-group">
            <label>Tipo de conexión del equipo</label>
            <br>
            <select name="tipoconexion" class="form-select bg-light shadow-sm">
                <option value="">Seleccione una opción</option>
                <option value="WAN">WAN</option>
                <option value="LAN">LAN</option>
            </select>
            </div>
            <br>
            <div class="form-group">
                <br>
                <button class="btn btn-primary btn-lg btn-block">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</div>

@endsection