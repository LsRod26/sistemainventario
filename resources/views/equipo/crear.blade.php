@extends('layout')

@section('titulo','Registrar un equipo')

@section('contenido')

<div class="container mt-5">
    <div class="col-8">
        <h1 class='display-4'> Registre un equipo en el sistema</h1>
        <form  method="POST" enctype="multipart/form-data" action="{{route('equipo.store')}}">
            @csrf
            <div class="form-group">
                <label>Equipo Personal o Institucional</label>
                <br>
                <select name="equipopersonal" id="equipopersonal" class="form-select bg-light shadow-sm">
                    <option value="">Seleccione una opción</option>
                    <option value="INSTITUCIONAL">INSTITUCIONAL</option>
                    <option value="PERSONAL">PERSONAL</option>
                </select>
            </div>
            <br>

            <label>Nombre Equipo</label>
            <div class="input-group mb-3">
                <br>
                <span class="input-group-text d-none" id="personaleti">PERSONAL - </span>
                <input class="form-control bg-light shadow-sm" type="text" name="nombreequipo" aria-describedby="personal"> 
            </div>
            <br>
            <div class="form-group">
                <label>Tipo de equipo</label>
                <br>
                <select name="tipoequipo" id="tipoequipo" class=" form-select bg-light shadow-sm">
                    <option value="">Seleccione una opción</option>
                    <option value="PC">PC</option>
                    <option value="LAPTOP">Laptop</option>
                    <option value="ALLINONE">All in one</option>
                </select>
            </div>
            <br>
            <div class="form-group">
            <label>Tipo de conexión del equipo</label>
            <br>
            <select name="tipoconexion" class="form-select bg-light shadow-sm">
                <option value="">Seleccione una opción</option>
                <option value="WAN">WAN</option>
                <option value="LAN">LAN</option>
            </select>
            </div>
            <br>
            

            <div class="form-group d-none" id="personal" name="personal">
                <label>MARCA<br></label>
                <input type="text" name="marca" id="marca" class="form-control bg-light shadow-sm"><br>
                <br>
                <label>IP<br></label>
                <input type="text" name="ip" id="ip" class="form-control bg-light shadow-sm">
                <br>
            </div>
            <br>
            <div class="form-group">
                <br>
                <button class="btn btn-primary btn-lg btn-block">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</div>

@endsection

@section('script')

    <script>
        $(document).ready(function(){
            $('#equipopersonal').on('change', function(){
                if(this.value == 'PERSONAL'){   
                    $('#personal').removeClass('d-none').addClass('d-block');
                    $('#personaleti').removeClass('d-none').addClass('d-block');
                    $('#tipoequipo').val('LAPTOP');

                }else{
                    $('#personal').removeClass('d-block').addClass('d-none');
                    $('#personaleti').removeClass('d-block').addClass('d-none');
                    $('#tipoequipo').val('');
                }
            })
        })
    </script>

@endsection