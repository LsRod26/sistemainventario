@extends('layout')

@section('titulo','Editar un equipo')

@section('contenido')

<div class="container mt-5">
    <div class="col-8">
        <h1 class='display-4'> Editar un equipo en el sistema</h1>
        <form  method="POST" enctype="multipart/form-data" action="{{route('equipo.update', $equipo)}}">
            @csrf @method('PATCH')
            <div class="form-group">
                <label>Nombre Equipo</label>
                <br>
                <input class="form-control bg-light shadow-sm" type="text" name="nombreequipo" value='{{$equipo->nombre_equipo}}'> 
            </div>
            <br>
            <div class="form-group">
                <label>Tipo de equipo</label>
                <br>
                <select name="tipoequipo" class=" form-select bg-light shadow-sm">
                    <option value="">Seleccione una opción</option>
                    <option value="PC" @if(old('tipoequipo',$equipo->tipo) == "PC"){{'selected'}}@endif>PC</option>
                    <option value="LAPTOP" @if(old('tipoequipo',$equipo->tipo) == "LAPTOP"){{'selected'}}@endif>Laptop</option>
                </select>
            </div>
            <br>
            <div class="form-group">
            <label>Tipo de conexión del equipo</label>
            <br>
            <select name="tipoconexion" class="form-select bg-light shadow-sm">
                <option value="">Seleccione una opción</option>
                <option value="WAN" @if(old('tipoconexion',$equipo->tipo_conexion) == "WAN"){{'selected'}}@endif>WAN</option>
                <option value="LAN" @if(old('tipoconexion',$equipo->tipo_conexion) == "LAN"){{'selected'}}@endif>LAN</option>
            </select>
            </div>
            <br>
            <div class="form-group">
                <br>
                <button class="btn btn-primary btn-lg btn-block">
                    Guardar
                </button>
                <a class="btn color-grey btn-lg btn-block" href="{{route('buscar')}}"> Regresar</button>
            </div>
        </form>
    </div>
</div>

@endsection