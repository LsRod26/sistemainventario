@section('titulo','Buscar')

@extends('layout')

@section('contenido')

<div class="container mt-5">
    <div class="col-8">
        <a class="btn btn-primary btn-lg btn-block" href="{{route('buscar')}}">
            Regresar
        </a>
        <h2> DETALLES DEL FUNCIONARIO - {{$funcionario->nombres}}</h2>
        <ul class="bg-color-white">
            <li>CEDULA: {{$funcionario->cedula }}</li>
            <li>CARGO: {{$funcionario->cargo }}</li>
            <li>PERFIL DE NAVEGACION: {{$funcionario->perfil_navegacion }}</li>
            <li>ACTIVO: {{$funcionario->ACTIVO }}</li> 
        </ul>
    </div>
    
</div>

<div class="container mt-5">
    <div class="col-8 ">
        <h2 > SISTEMAS A LOS QUE TIENE ACCESO</h2>
        <ul >
            @foreach ($sistemasid as $item)
            <li>
                {{$item->nombre}}
            </li>    
            @endforeach
            
        </ul>
    </div>
</div>

<div class="container mt-5">
    <div class="col-8 ">
        <h2> EQUIPO ASIGNADO</h2>
        @if (empty($equipofuncionario))
            <ul>
                <li>SIN EQUIPO ASIGNADO</li>
                <br>
                <li> SIN COMPONENTES ASIGNADO</li>
            </ul>
        @else
            <ul>
                <li>
                    NOMBRE DEL EQUIPO: {{$equipofuncionario->nombre_equipo}}
                </li>
                <li>
                    TIPO: {{$equipofuncionario->tipo}}
                </li>
                <li>
                    CONEXION: {{$equipofuncionario->tipo_conexion}}
                </li>     
            </ul>

            <h2>Componentes Asignados</h2>
            <ul>
                @foreach ($componentes as $comp)
                <li class="border-2 mt-3">
                    
                    <p><strong>ID TIPO COMPONENTE:</strong> {{$comp ->id_tipo_componente }}</p>
                    
                    <p><strong> COMPONENTE:</strong> {{$comp ->tipocomponente }}</p>
                    <p><strong>CODIGO COMPONENTE: </strong> {{$comp ->codigo_componente }}</p>
                    <p><strong>MARCA:</strong> {{$comp ->marca }}</p>
                    <p><strong>SERIAL:</strong> {{$comp ->serial }}</p>
                    
                    @if ($comp->detalle)
                        @if ($comp->id_tipo_componente == $imp)
                            <p><strong>IMPRESION A COLOR:</strong> {{$comp->detalle->COLOR }}</p>
                        @else
                            <p><strong>PROCESADOR:</strong>  {{$comp->detalle->procesador}}</p>
                            <p><strong>RAM:</strong>  {{$comp->detalle->ram}}</p>                        
                            <p><strong>MODELO:</strong> {{$comp->detalle->modelo}}</p>                        
                            <p><strong>DISCO DURO:</strong> {{$comp->detalle->discoduro}}</p>                        
                        @endif
                        
                    @endif
                </li>
                @endforeach
            </ul>
            @endif
    </div>
       
</div>

@endsection