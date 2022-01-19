@extends('layout')

@section('titulo','Editar sistema')

@section('contenido')

<div class="container mt-5">
    <div class="col-8 ">
        <h1 class="display-4">Edite el sistema</h1>
        <form class="py-3 px-2" method="POST" enctype="multipart/form-data" action="{{route('sistemas.update',$sistema)}}">
            @csrf @method('PATCH')
                <div class="form-group">
                    <label> Nombre del sistema</label>
                    <br>
                    <input class="form-control bg-light shadow-sm" type="text" name="nombresistema" value={{$sistema->nombre}}>
                </div>
                <br>
                <div class="form-group">
                    <button class="btn btn-primary btn-lg btn-block"> Guardar</button>
                    <a class="btn color-grey btn-lg btn-block" href="{{route('buscar')}}"> Regresar</button>
                </div>
           
        </form>
    </div>
</div>
    
@endsection
