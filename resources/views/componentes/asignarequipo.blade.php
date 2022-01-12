@extends('layout')

@section('titulo','Asignar Equipo a Componentes')

@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-6 mx-auto">
                <h1 class="display-4">Asignar Componente a Equipo</h1>
                <form class="bg-white shadow rounded py-3 px-2" method="POST" enctype="multipart/form-data" action="{{route('guardar.asignar')}}">
                    @csrf
                    <div class="form-group">
                        <label>Seleccione el tipo de componente a registrar<br></label>
                        <select name="tipocomponente" id="tipocomponente">
                            <option value="">Seleccione una opción</option>
                            @foreach ($tipocomponentes as $tipo)
                                <option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                            @endforeach
                        </select>
                        <br>
                        <br>
                        <label>Seleccione el componente<br></label>
                        <select name="componente" id="componente">
                            <option value="">Seleccione un componente</option>
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Seleccione el componente<br></label>
                        <select name="equipo" id="equipo">
                            <option value="">Seleccione un Equipo</option>
                            @foreach($equipos as $equipo)
                                <option value="{{$equipo->id}}">{{$equipo->nombre_equipo}}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <button class="btn btn-primary btn-lg btn-block">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
         $('#equipo').select2();
        $('#tipocomponente').on('change', function(){
            var resultado = document.getElementById('tipocomponente').value;
            if (resultado != '0'){
                var ruta = 'componentes'+"/"+resultado;
                $.ajax({type:'GET', datatype:"JSON", url:ruta, success:function (respuesta){
                    $('#componente').empty(),
                    $('#componente').append("<option value=''>Selecciona un componente</option>");
                    $.each(respuesta, function(index, value){
                        $('#componente').append("<option value='"+index+"'>"+value+"</option>");
                    });
                }})
            }
        });
    </script>    
@endsection

