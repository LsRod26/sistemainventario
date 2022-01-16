@extends('layout')

@section('titulo','Registrar Funcionario')

@section('contenido')
    <div class="container mt-5">
        <div class="col-8">
            <h1 class="display-4"> Registrar a un funcionario</h1>
            <form  method="POST" enctype="multipart/form-data" action="{{route('funcionario.store')}}">
                @csrf
                <div class="form-group">
                    <label>Cedula</label>
                    <input class="form-control bg-light shadow-sm" type="text" name="cedula">
                </div>
                <div class="mt-4">
                    <div class="form-group">
                        <label>Nombres del funcionario </label>
                        <input class="form-control bg-light shadow-sm" type="text" name="nombresfuncionario">
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Cargo</label>
                        <input class="form-control bg-light shadow-sm" type="text" name="cargo">
                    </div>
                    <br>
                    <div class="form-group">
                        <label> Perfil de Navegación </label>
                        <input class="form-control bg-light shadow-sm" type="text" name="perfilnavegacion">
                    </div>
                    
                    <div>
                        <br>
                        <label for="estadofuncionario">Estado</label>
                        <select name="estadofuncionario" id="estadofuncionario" class="form-select bg-light shadow-sm">
                            <option value="0">INACTIVO</option>
                            <option value="1">ACTIVO</option>
                        </select>
                    </div>
                    <br>
                    <div>
                        <label for="direccion">Dirección</label>
                        <select name="selectdireccion" id="direccion" class="form-select bg-light shadow-sm">
                            <option value="">Seleccione una opción</option>
                            @foreach ($listadirecciones as $item)
                                <option value="{{$item->id}}">{{$item->direccion}}</option>    
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <br>
                        <button class="btn btn-primary btn-lg btn-block">
                            Guardar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection