@extends('layout')

@section('titulo','Registrar Dirección')

@section('contenido')

<div class="container">
    <div class="row">
        <div class="col-12 col-sm-10 col-lg-6 mx-auto">
            <h1 class="display-4">Registrar una nueva direccion</h1>
            <form class="bg-white shadow rounded py-3 px-2" method="POST" enctype="multipart/form-data" action="{{route('direccion.store')}}">
                @csrf
                <div class="form-group">
                    <label>Nombre de la dirección</label>
                    <input class="form-control bg-light shadow-sm" type="text" name="nombredireccion">
                </div>
                <div class="form-group">
                    <label for="estadodireccion">Estado</label>
                    <select name="estadodireccion" id="estadodireccionid">
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

</div>

@endsection