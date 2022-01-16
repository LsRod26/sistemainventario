@extends('layout')

@section('titulo','Registrar Dirección')

@section('contenido')

<div class="container mt-5">
    <div class="col-8">
        <h1 class="display-4">Registrar una nueva direccion</h1>
        <form class="py-3 px-2" method="POST" enctype="multipart/form-data" action="{{route('direccion.store')}}">
            @csrf
            <div class="form-group">
                <label>Nombre de la dirección</label>
                <input class="form-control bg-light shadow-sm" type="text" name="nombredireccion">
            </div>
            <br>
            <div class="form-group">
                <label for="estadodireccion">Estado</label>
                <select class="form-select bg-light shadow-sm" name="estadodireccion" id="estadodireccionid">
                    <option value="">SELECCIONE UNA OPCION</option>
                    <option value="0">INACTIVO</option>
                    <option value="1">ACTIVO</option>
                </select>
            </div>
            <div>
                <br>
                <button class="btn btn-primary btn-lg btn-block">Guardar</button>
            </div>

        </form>
    </div>
    

</div>

@endsection