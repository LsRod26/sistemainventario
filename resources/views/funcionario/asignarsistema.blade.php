@extends('layout')

@section('titulo','Asignar funcionarios a sistema')

@section('contenido')

<div class="container mt-5">
    <div class="col-8 mx-auto">
        <h1 class="display-4"> Asignar funcionario a un sistema</h1>
        <form  method="POST" enctype="multipart/form-data" action="{{route('store.funcionariosistema')}}">
            @csrf
            <br>
            <div class="form-group">
                <label>Cédula del funcionario</label>
                <br>
                <input class="form-control  bg-light shadow-sm" type="text" name="cedula">
            </div>
            <div class="form-group">
                <br>
                <label for="selectsistemas">Sistemas Registrados</label>
                <select name="selectsistemas" id="sistemas" class="form-select bg-light shadow-sm">
                    <option value="">Seleccione un sistema</option>
                    @foreach ($listasistemas as $itemsistema)
                        <option value="{{$itemsistema->id}}">{{$itemsistema->nombre}}</option>    
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <br>
                <label for="estadofuncionariosistema">Estado</label>
                <select name="estadofuncionariosistema" id="estadofuncionariosistema" class="form-select bg-light shadow-sm">
                    <option value="">Seleccione una opción</option>
                    <option value="1">ACTIVO</option>
                    <option value="0">INACTIVO</option>
                </select>
            </div>
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

