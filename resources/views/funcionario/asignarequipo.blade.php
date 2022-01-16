@extends('layout')

@section('titulo','Asignar Funcionario a Equipo')

@section('contenido')

<div class="container mt-5">
    <div class="col-8 mx-auto">
        <h1 class="display-4">Asignar Funcionario a Equipo</h1>
        <form  method="POST" enctype="multipart/form-data" action="{{route('store.funcionarioequipo')}}">
            @csrf
            <br>
            <div class="form-group">
                <label for="selectdireccion">Direcciones registradas</label>
                <select name="selectdireccion"  id="selectdireccion" class="form-select bg-light shadow-sm">
                    <option value="0">Seleccione una opción</option>
                    @foreach ($listadirecciones as $direcciones)
                        <option value="{{$direcciones->id}}">{{$direcciones->direccion}}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div class="form-group">
                <label>Seleccione un funcionario</label>
                <select name="selectfuncionario" id="selectfuncionario" class="form-select bg-light shadow-sm">
                <option value="0">Seleccione una opcion</option>
                </select>
            </div>
            <br>
            <div class="form-group">
                <label>Seleccione un equipo a asignar</label>
                <select name="selectequipos" class="form-select bg-light shadow-sm">
                    <option value="">Seleccione una opción</option>
                    @foreach ($listaequipos as $equipo)
                        <option value="{{$equipo->id}}">{{$equipo->nombre_equipo}}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div class="form-group">
                <label>Estado</label>
                <select name="selectestado" class="form-select bg-light shadow-sm">
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

