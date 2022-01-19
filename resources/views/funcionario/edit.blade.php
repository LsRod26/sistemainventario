@extends('layout')

@section('titulo','Editar Funcionario')

@section('contenido')
<div class="container mt-5">
    <div class="col-8">
        <h1 class="display-4"> Editar funcionario</h1>
        <form  method="POST" enctype="multipart/form-data" action="{{route('funcionario.update' , $funcionario)}}">
            @csrf @method('PATCH')
            <div class="form-group">
                <label>Cedula</label>
                <input class="form-control bg-light shadow-sm" type="text" name="cedula" value='{{$funcionario->cedula}}'>
            </div>
            <div class="mt-4">
                <div class="form-group">
                    <label>Nombres del funcionario </label>
                    <input class="form-control bg-light shadow-sm" type="text" name="nombresfuncionario" value='{{$funcionario->nombres}}'>
                </div>
                <br>
                <div class="form-group">
                    <label>Cargo</label>
                    <input class="form-control bg-light shadow-sm" type="text" name="cargo" value='{{$funcionario->cargo}}'>
                </div>
                <br>
                <div class="form-group">
                    <label> Perfil de Navegación </label>
                    <input class="form-control bg-light shadow-sm" type="text" name="perfilnavegacion" value='{{$funcionario->perfil_navegacion}}'>
                </div>
                
                <div>
                    <br>
                    <label for="estadofuncionario">Estado</label>
                    <select name="estadofuncionario" id="estadofuncionario" class="form-select bg-light shadow-sm">
                        <option value="0" @if(old('estadofuncionario',$funcionario->ACTIVO) == "0"){{'selected'}}@endif>INACTIVO</option>
                        <option value="1" @if(old('estadofuncionario', $funcionario->ACTIVO) == "1"){{'selected'}}@endif>ACTIVO</option>
                    </select>
                </div>
                <br>
                <div>
                    <label for="direccion">Dirección</label>
                    <select name="selectdireccion" id="direccion" class="form-select bg-light shadow-sm">
                        <option value="">Seleccione una opción</option>
                        @foreach ($listadirecciones as $item)
                            <option value="{{$item->id}}" {{old('selectdireccion', $funcionario->id_direccion) == $item->id ? 'selected' : '' }}>{{$item->direccion}}</option>    
                        @endforeach
                    </select>
                </div>
                <div>
                    <br>
                    <button class="btn btn-primary btn-lg btn-block">
                        Guardar
                    </button>
                    <a class="btn color-grey btn-lg btn-block" href="{{route('buscar')}}"> Regresar</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection