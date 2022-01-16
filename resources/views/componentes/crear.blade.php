@extends('layout')

@section('titulo','Registrar componentes')

@section('contenido')
    <div class="container mt-5">
        <div class="col-8">
            <h1 class="display-4">Registre el componente y sus caracteristicas</h1>
            <form method="POST" enctype="multipart/form-data" action="{{route('componente.store')}}">
                @csrf
                <div class="form-group">
                    <label> Código del componente <br> </label>
                    <input type="text" name="codigocomponente" class="form-control bg-light shadow-sm">
                </div>
                <br>
                <div class="form-group">
                    <label>Marca <br></label>
                    <input type="text" name="marca" class="form-control bg-light shadow-sm">
                </div>
                <br>
                <div class="form-group">
                    <label>Serial del componente <br></label>
                    <input type="text" name="serial" class="form-control bg-light shadow-sm">
                </div>
                <br>
                <div class="form-group">
                    <label>Estado<br></label>
                    <select name="selectestado" class="form-select bg-light shadow-sm">
                        <option value="">Seleccione una opción</option>
                        <option value="1">ACTIVO</option>
                        <option value="0">INACTIVO</option>
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <label>Asignar a un equipo<br></label>
                    <select name="selectequipo" id="selectequipo" class="form-select bg-light shadow-sm">
                        <option value="">Sin asignar</option>
                        @foreach ($listaequipos as $equipo)
                        <option value='{{$equipo->id}}'>{{$equipo->nombre_equipo}}</option>    
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <label>¿Tiene tarjeta de red?<br></label>
                    <select name="tarjeta_red" id="tarjeta_red" class="form-select bg-light shadow-sm">
                        <option value="">Seleccione una opción</option>
                        <option value="1">Si</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <br>
                <div name="IP" id="IP"  class="form-group d-none">
                    <label>IP<br></label>
                    <input type="text" name="ip" id="ip" class="form-control bg-light shadow-sm">
                    <br>
                    <label>MAC<br></label>
                    <input type="text" name="mac" id="mac" class="form-control bg-light shadow-sm">
                </div>
                <br>
                <div class="form-group">
                    <label>Seleccione el tipo de componente<br></label>
                    <select name="selecttipocomponente" id="selecttipocomponente" class="form-select bg-light shadow-sm">
                        <option value="">Seleccione una opción</option>
                        @foreach ($tipocomponentes as $tipo)
                        <option value="{{$tipo->nombre}}">{{$tipo->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="form-group d-none" id="CPU" name="CPU">
                    <label>Procesador<br></label>
                    <input type="text" name="procesador" id="procesador" class="form-control bg-light shadow-sm"><br>
                    <br>
                    <label>RAM<br></label>
                    <input type="text" name="ram" id="ram" class="form-control bg-light shadow-sm">
                </div>
                <div class="form-group d-none" id="IMPRESORA" name="IMPRESORA" >
                    <label>¿A color?<br></label>
                    <select name="IMPCOLOR" id="IMPCOLOR" class="form-select bg-light shadow-sm">
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
        </div>
    </div>

@endsection

@section('script')

    <script>
        $(document).ready(function(){
            $('#tarjeta_red').on('change', function(){
                if(this.value === '1'){   
                    $('#IP').removeClass('d-none').addClass('d-block');
                }else{
                    $('#IP').removeClass('d-block').addClass('d-none');
                }
            })
        })

        $(document).ready(function(){
            $('#selecttipocomponente').on('change', function(){
                if(this.value == 'CPU'){
                    $('#IMPRESORA').removeClass('d-block').addClass('d-none');
                    $('#CPU').removeClass('d-none').addClass('d-block');

                }else if (this.value === 'IMPRESORA'){ 
                    $('#CPU').removeClass('d-block').addClass('d-none');
                    $('#IMPRESORA').removeClass('d-none').addClass('d-block');
                }
                else{
                    $('#CPU').removeClass('d-block').addClass('d-none');
                    $('#IMPRESORA').removeClass('d-block').addClass('d-none');
                }
            })
        })


    </script>
    
@endsection