@extends('layout')

@section('titulo','Registrar un equipo')

@section('contenido')

<div class="row">
    <div class="col-12 col-sm-10 col-lg-6 mx-auto">
        <h1 class='display-4'> Registre un equipo en el sistema</h1>
        <form class="bg-white shadow rounded py-3 px-2" method="POST" enctype="multipart/form-data" action="{{route('equipo.store')}}">
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
                <select name="tipoequipo">
                    <option value="">Seleccione una opción</option>
                    <option value="PC">PC</option>
                    <option value="LAPTOP">Laptop</option>
                </select>
            </div>
            <br>
            <div class="form-group">
            <label>Tipo de conexión del equipo</label>
            <br>
            <select name="tipoconexion">
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