@extends('layout')

@section('titulo','Registrar componentes')

@section('contenido')
    <h1>Registre el componente y sus caracteristicas</h1>
    <form method="POST" enctype="multipart/form-data" action="{{route('componente.store')}}">
        @csrf
        
        <div>
            <label> Código del componente <br> </label>
            <input type="text" name="codigocomponente">
        </div>
        <br>
        <div>
            <label>Marca <br></label>
            <input type="text" name="marca">
        </div>
        <br>
        <div>
            <label>Serial del componente <br></label>
            <input type="text" name="serial">
        </div>
        <br>
        <div class="form-group">
            <label>Estado<br></label>
            <select name="selectestado">
                <option value="">Seleccione una opción</option>
                <option value="1">ACTIVO</option>
                <option value="0">INACTIVO</option>
            </select>
        </div>
        <br>
        <div class="form-group">
            <label>Asignar a un equipo<br></label>
            <select name="selectequipo" id="selectequipo">
                <option value="">Sin asignar</option>
                @foreach ($listaequipos as $equipo)
                <option value='{{$equipo->id}}'>{{$equipo->nombre_equipo}}</option>    
                @endforeach
            </select>
        </div>
        <br>
        <div>
            <label>¿Tiene tarjeta de red?<br></label>
            <select name="tarjeta_red" id="tarjeta_red">
                <option value="">Seleccione una opción</option>
                <option value="1">Si</option>
                <option value="0">No</option>
            </select>
        </div>
        <br>
        <div name="IP" id="IP" hidden>
            <label>IP<br></label>
            <input type="text" name="ip" id="ip">
            <br>
            <label>MAC<br></label>
            <input type="text" name="mac" id="mac">
        </div>
        <br>
        <div class="form-group">
            <label>Seleccione el tipo de componente<br></label>
            <select name="selecttipocomponente" id="selecttipocomponente">
                <option value="">Seleccione una opción</option>
                @foreach ($tipocomponentes as $tipo)
                <option value="{{$tipo->nombre}}">{{$tipo->nombre}}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div class="form-group" id="CPU" name="CPU" hidden>
            <label>Procesador<br></label>
            <input type="text" name="procesador" id="procesador"><br>
            <br>
            <label>RAM<br></label>
            <input type="text" name="ram" id="ram">
        </div>
        <div class="form-group" id="IMPRESORA" name="IMPRESORA" hidden>
            <label>¿A color?<br></label>
            <select name="IMPCOLOR" id="IMPCOLOR">
                <option value="">Seleccione una opción</option>
                <option value="1">SI</option>
                <option value="0">NO</option>
            </select>
        </div>
        <br>
        <div class="form-group">
            <button class="btn btn-primary btn-lg btn-block">Guardar</button>
        </div>
    </form>

@endsection

@section('script')

    <script>
        $(document).ready(function(){
            $('#tarjeta_red').on('change', function(){
                if(this.value === '1'){   
                    $('#IP').show();
                }else{
                    $('#IP').hide();
                }
            })
        })

        $(document).ready(function(){
            $('#selecttipocomponente').on('change', function(){
                if(this.value == 'CPU'){
                    $('#IMPRESORA').hide();
                    $('#CPU').show();

                }else if (this.value === 'IMPRESORA'){ 
                    $('#CPU').hide();
                    $('#IMPRESORA').show();
                }
                else{
                    $('#CPU').hide();
                    $('#IMPRESORA').hide();
                }
            })
        })


    </script>
    
@endsection