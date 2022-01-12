@extends('layout')

@section('titulo','Home')
    
@section('contenido')
    <h2> RESUMEN DISPOSITIVOS REGISTRADOS </h2>

    <h1> COMPONENTES REGISTRADOS </h1>
    <ul>
        @forelse ($sistema1 as $item)
            <li>
                <h3>{{$item->nombre}}</h3>
                <p>{{$item->cantidad}}</p>
            </li>
        @empty    
        @endforelse
        <li> <h3>EQUIPOS</h3>
            <p>{{$equipos}}</p>
        </li>
        <li><h3>FUNCIONARIOS</h3>
            <p>{{$funcionarios}}</p>
        </li>
        <li> <h3>SISTEMAS</h3>
            <p>{{$sistemas}}</p>
        </li>
        <li><h3>DIRECCIONES</h3>
            <p>{{$direcciones}}</p>
        </li>
    </ul>

    
@endsection

@section('script')
    <script>
            $(document).ready( function () {
                $('#tabla').DataTable();
            } );  
    </script>    
@endsection