@extends('layout')

@section('titulo','Asignar Funcionario a Equipo')

@section('contenido')

<div class="row">
    <div class="col-12 col-sm-10 col-lg-6 mx-auto">
        <h1 class="display-4">Asignar Funcionario a Equipo</h1>
        <form class="bg-white shadow rounded py-3 px-2" method="POST" enctype="multipart/form-data" action="{{route('store.funcionarioequipo')}}">
            @csrf
            <br>
            <div class="form-group">
                <label for="selectdireccion">Direcciones registradas</label>
                <select name="selectdireccion"  id="selectdireccion">
                    <option value="0">Seleccione una opción</option>
                    @foreach ($listadirecciones as $direcciones)
                        <option value="{{$direcciones->id}}">{{$direcciones->direccion}}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div class="form-group">
                <label>Seleccione un funcionario</label>
                <select name="selectfuncionario" id="selectfuncionario">
                <option value="0">Seleccione una opcion</option>
                </select>
            </div>
            <br>
            <div class="form-group">
                <label>Seleccione un equipo a asignar</label>
                <select name="selectequipos">
                    <option value="">Seleccione una opción</option>
                    @foreach ($listaequipos as $equipo)
                        <option value="{{$equipo->id}}">{{$equipo->nombre_equipo}}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div class="form-group">
                <label>Estado</label>
                <select name="selectestado">
                    <option value="">Seleccione una opción</option>
                    <option value="1">ACTIVO</option>
                    <option value="0">INACTIVO</option>
                </select>
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
            $('#selectdireccion').on('change', function(){    
                var resultado = document.getElementById("selectdireccion").value;           
                if(resultado != "0"){                
                var ruta = "funcionarios"+"/"+resultado;
                $.ajax({type:'GET', datatype:"JSON", url:ruta, success:function (respuesta){
                    $('#selectfuncionario').empty();
                    $('#selectfuncionario').append("<option value=''>Selecciona un funcionario</option>");
                    $.each(respuesta, function(index, value){
                        $('#selectfuncionario').append("<option value='"+index+"'>"+value+"</option>");
                        });
                } });}
            });


    </script>

@endsection

