@extends('layout')

@section('titulo','Home')
    
@section('contenido')
    <div class="container mt-5">
        <h1 class="display-5"> COMPONENTES REGISTRADOS </h1>
        <div class="d-flex flex-wrap justify-content-between align-items-start">
            @forelse ($sistema1 as $item)
                <div class = "card border-3 shadow-sm mt-5 mx-auto" style="width: 18rem">
                    <div class="card-body">
                        <h2 class="card-title">{{$item->nombre}}</h2>
                        <p class="card-text">{{$item->cantidad}}</p>
                    </div>
                </div>
            @empty    
            @endforelse
            <div class = "card border-3 shadow-sm mt-4 mx-auto" style="width: 18rem">
                <div class="card-body">
                    <h2 class="card-title">EQUIPOS</h3>
                    <p class="d-flex justify-content-between align-item-center">{{$equipos}}</p>
                </div>
            </div>
            
            <div class = "card border-3 shadow-sm mt-4 mx-auto" style="width: 18rem">
                <div class="card-body">
                    <h2 class="card-title">FUNCIONARIOS</h3>
                    <p class="d-flex justify-content-between align-item-center">{{$funcionarios}}</p>
                </div>
            </div>
            
            <div class = "card border-3 shadow-sm mt-4 mx-auto" style="width: 18rem">
                <div class="card-body">
                    <h2 class="card-title">SISTEMAS</h3>
                    <p class="d-flex justify-content-between align-item-center">{{$sistemas}}</p>
                </div>
            </div>

            <div class = "card border-3 shadow-sm mt-4 mx-auto" style="width: 18rem">
                <div class="card-body">
                    <h2 class="card-title">DIRECCIONES</h3>
                    <p class="d-flex justify-content-between align-item-center">{{$direcciones}}</p>
                </div>
            </div>       
        </div>
    </div>
@endsection

@section('script')
    <script>
            $(document).ready( function () {
                $('#tabla').DataTable();
            } );  
    </script>    
@endsection