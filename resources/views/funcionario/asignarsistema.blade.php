@extends('layout')

@section('titulo','Asignar funcionarios a sistema')

@section('contenido')

<div class="row">
    <div class="col-12 col-sm-10 col-lg-6 mx-auto">
        <h1 class="display-4"> Asignar funcionario a un sistema</h1>
        <form class="bg-white shadow rounded py-3 px-2" method="POST" enctype="multipart/form-data" action="{{route('store.funcionariosistema')}}">
            @csrf
            <div class="form-group">
                <label>Cédula del funcionario</label>
                <br>
                <input class="form-control  bg-light shadow-sm" type="text" name="cedula">
            </div>
            <div class="form-group">
                <label for="selectsistemas">Sistemas Registrados</label>
                <select name="selectsistemas" id="sistemas">
                    <option value="">Seleccione un sistema</option>
                    @foreach ($listasistemas as $itemsistema)
                        <option value="{{$itemsistema->id}}">{{$itemsistema->nombre}}</option>    
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="estadofuncionariosistema">Estado</label>
                <select name="estadofuncionariosistema" id="estadofuncionariosistema">
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

