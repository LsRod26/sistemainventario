@extends('layout')

@section('titulo','Registrar un nuevo sistema')

@section('contenido')

<div class="container mt-5">
    <div class="col-8 ">
        <h1 class="display-4">
            Registrar un nuevo sistema
        </h1>
        
        @if(session('status'))
            {{session('status')}}
        @endif

        <form class="py-3 px-2" method="POST" enctype="multipart/form-data" action="{{route('sistema.store')}}">
            @csrf
               
                <div class="form-group">
                    <label> Nombre del sistema</label>
                    <br>
                    <input class="form-control bg-light shadow-sm" type="text" name="nombresistema">
                </div>
                <br>
                <div class="form-group">
                    <button class="btn btn-primary btn-lg btn-block"> Guardar</button>
                </div>
           
        </form>
    </div>
</div>
    
@endsection

