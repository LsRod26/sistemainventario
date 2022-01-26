@extends('layout')

@section('titulo','Registrar componentes')

@section('contenido')
    <div class="container mt-5">
        <div class="col-8">
            <h1 class="display-4">Edite el componente y sus caracteristicas</h1>
            <form method="POST" enctype="multipart/form-data" action="{{route('componente.update',$componente)}}">
                @csrf @method('PATCH')
                <div class="form-group">
                    <label> Código del componente <br> </label>
                    <input type="text" name="codigocomponente" class="form-control bg-light shadow-sm" value='{{$componente->codigo_componente}}'>
                </div>
                <br>
                <div class="form-group">
                    <label>Marca <br></label>
                    <input type="text" name="marca" class="form-control bg-light shadow-sm" value='{{$componente->marca}}'>
                </div>
                <br>
                <div class="form-group">
                    <label>Serial del componente <br></label>
                    <input type="text" name="serial" class="form-control bg-light shadow-sm" value='{{$componente->serial}}'>
                </div>
                <br>
                <div class="form-group">
                    <label>Estado<br></label>
                    <select name="selectestado" class="form-select bg-light shadow-sm">
                        <option value="">Seleccione una opción</option>
                        <option value="1" @if(old('selectestado',$componente->ACTIVO) == "1"){{'selected'}}@endif>ACTIVO</option>
                        <option value="0" @if(old('selectestado',$componente->ACTIVO) == "0"){{'selected'}}@endif>INACTIVO</option>
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <label>Asignar a un equipo<br></label>
                    <select name="selectequipo" id="selectequipo" class="form-select bg-light shadow-sm">
                        <option value="">Sin asignar</option>
                        @foreach ($listaequipos as $equipo)
                        <option value='{{$equipo->id}}'{{old('selectequipo', $equipo->id_equipo) == $equipo->id ? 'selected' : '' }}>{{$equipo->nombre_equipo}}</option>   
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <label>¿Tiene tarjeta de red?<br></label>
                    <select name="tarjeta_red" id="tarjeta_red" class="form-select bg-light shadow-sm">
                        <option value="">Seleccione una opción</option>
                        <option value="1" @if(old('tarjeta_red',$componente->tarjeta_red) == "1"){{'selected'}}@endif>Si</option>
                        <option value="0" @if(old('tarjeta_red',$componente->tarjeta_red) == "0"){{'selected'}}@endif>No</option>
                    </select>
                </div>
                <br>
                <div name="IP" id="IP"  class="form-group d-none">
                    <label>IP<br></label>
                    <input type="text" name="ip" id="ip" class="form-control bg-light shadow-sm" value='{{$componente->ip}}'>
                    <br>
                    <label>MAC<br></label>
                    <input type="text" name="mac" id="mac" class="form-control bg-light shadow-sm" value='{{$componente->mac}}'>
                </div>
                <br>
                <div class="form-group">
                    <label>Seleccione el tipo de componente<br></label>
                    <select name="selecttipocomponente" id="selecttipocomponente" class="form-select bg-light shadow-sm">
                        <option value="">Seleccione una opción</option>
                        @foreach ($tipocomponentes as $tipo)
                        <option value="{{$tipo->id}}" {{old('selecttipocomponente', $componente->id_tipo_componente) == $tipo->id ? 'selected' : '' }}>{{$tipo->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                
                @if ($a->nombre == 'CPU')

                    <div class="form-group" id="CPU" name="CPU">
                        <label>Procesador<br></label>
                    <input type="text" name="procesador" id="procesador" class="form-control bg-light shadow-sm" value="{{$datoscpu->procesador}}"><br>
                    <br>
                    <label>RAM<br></label>
                    <input type="text" name="ram" id="ram" class="form-control bg-light shadow-sm" value="{{$datoscpu->ram}}">
                </div>

                
                    
                @endif     

                @if ($a->nombre == 'IMPRESORA')
                    <div class="form-group" id="IMPRESORA" name="IMPRESORA">
                        <label>¿A color?<br></label>
                    <select name="IMPCOLOR" id="IMPCOLOR" class="form-select bg-light shadow-sm">
                        <option value="">Seleccione una opción</option>
                        <option value="1" @if(old('IMPCOLOR',$componente->COLOR) == "1"){{'selected'}}@endif>SI</option>
                        <option value="0" @if(old('IMPCOLOR',$componente->COLOR) == "0"){{'selected'}}@endif>NO</option>
                    </select>
                </div>

                
  
                @endif                    
                <br>
                <div class="form-group">
                    <button class="btn btn-primary btn-lg btn-block">Guardar</button>
                    <a class="btn color-grey btn-lg btn-block" href="{{route('buscar')}}"> Regresar</button>
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
                
                var a = document.getElementById('selecttipocomponente');
                var strtipo = a.options[a.selectedIndex].text;

                if(strtipo == 'CPU'){
                    $('#IMPRESORA').removeClass('d-block').addClass('d-none');
                    $('#CPU').removeClass('d-none').addClass('d-block');

                }else if (strtipo === 'IMPRESORA'){ 
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