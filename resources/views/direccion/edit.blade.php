@extends('layout')

@section('titulo','Registrar Dirección')

@section('contenido')

<div class="container mt-5">
    <div class="col-8">
        <h1 class="display-4">Editar una direccion</h1>
        <form class="py-3 px-2" method="POST" enctype="multipart/form-data" action="{{route('direccion.update',$direccion)}}">
            @csrf @method('PATCH')
            <div class="form-group">
                <label>Nombre de la dirección</label>
                <input class="form-control bg-light shadow-sm" type="text" name="nombredireccion" value="{{$direccion->direccion}}">
            </div>
            <br>
            <div class="form-group">
                <label for="estadodireccion">Estado</label>
                <select class="form-select bg-light shadow-sm" name="estadodireccion" id="estadodireccionid">
                    <option value="">SELECCIONE UNA OPCION</option>
                    <option value="0" @if(old('estadodireccion',$direccion->ACTIVO) == "0"){{'selected'}}@endif>INACTIVO</option>
                    <option value="1"@if(old('estadodireccion',$direccion->ACTIVO) == "1"){{'selected'}}@endif>ACTIVO</option>
                </select>
            </div>
            <div>
                <br>
                <button class="btn btn-primary btn-lg btn-block">Guardar</button>
                <a class="btn color-grey btn-lg btn-block" href="{{route('buscar')}}"> Regresar</button>
            </div>

        </form>
    </div>
    

</div>

@endsection