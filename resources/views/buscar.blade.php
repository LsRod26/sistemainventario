@section('titulo','Buscar')

@extends('layout')

@section('contenido')
    <div class="container bg-dark">
        <h1 class="display-4">Buscar Elementos registrados en el sistema</h1>
        <form class="bg-white shadow rounded py-3 px-2" method="" enctype="multipart/form-data" action="" data-toggle="validator">
            @csrf
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                <a class="nav-link active" id="funcionarios-tab" data-bs-toggle="tab" data-bs-target="#funcionarios" type="button" role="tab" aria-controls="funcionarios" aria-selected="true">Funcionarios</a>
                </li>
                <li class="nav-item" role="presentation">
                <a class="nav-link" id="equipos-tab" data-bs-toggle="tab" data-bs-target="#equipos" type="button" role="tab" aria-controls="equipos" aria-selected="false" >Equipos</a>
                </li>
                <li class="nav-item" role="presentation">
                <a class="nav-link" id="componentes-tab" data-bs-toggle="tab" data-bs-target="#componentes" type="button" role="tab" aria-controls="componentes" aria-selected="false">Componentes</a>
                </li>
                <li class="nav-item" role="presentation">
                <a class="nav-link" id="sistemas-tab" data-bs-toggle="tab" data-bs-target="#sistemas" type="button"  role="tab" aria-controls="sistemas" aria-selected="false" >Sistemas</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="direccion-tab" data-bs-toggle="tab" data-bs-target="#direccion" type="button" role="tab" aria-controls="direccion" aria-selected="false">Dirección</a>
                </li>
            </ul>
            <br>
            <div class="tab-content" id="contenido">
                <div class="tab-pane active" role="tabpanel" id="funcionarios"  aria-labelledby="funcionarios-tab">
                    <div class="form-group">
                        <table id="funcionariostabla" name="funcionariostabla" class="display datos table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Cédula</th>
                                    <th>Nombres</th>
                                    <th>Dirección</th>
                                    <th>Cargo</th>
                                    <th>Perfil de Navegación</th>
                                    <th>Estado</th>
                                    <th>Fecha de Creación</th>
                                    <th>Fecha de Actualización</th>
                                </tr>
                            </thead>    
                            <tbody>
                                @foreach ($tfuncionarios as $funcionario)
                                    <tr>
                                        <td>{{$funcionario->cedula}}</td>
                                        <td>{{$funcionario->nombres}}</td>
                                        <td>{{$funcionario->id_direccion}}</td>
                                        <td>{{$funcionario->cargo}}</td>
                                        <td>{{$funcionario->perfil_navegacion}}</td>
                                        <td>{{$funcionario->ACTIVO}}</td>
                                        <td>{{$funcionario->created_at}}</td>
                                        <td>{{$funcionario->updated_at}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="equipos" role="tabpanel"  aria-labelledby="equipos-tab">
                    <div class="form-group">
                        <table id="equipotabla" name="equipotabla" class="datos" style="width:100%">   
                            <thead>
                                <tr>
                                    <th>Nombre del equipo</th>
                                    <th>Tipo</th>
                                    <th>Tipo de Conexión</th>
                                    <th>Estado</th>
                                    <th>Fecha de Creación</th>
                                    <th>Fecha de Actualización</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tequipos as $equipo)
                                    <tr>
                                        <td>{{$equipo->nombre_equipo}}</td>
                                        <td>{{$equipo->tipo}}</td>
                                        <td>{{$equipo->tipo_conexion}}</td>
                                        <td>{{$equipo->ACTIVO}}</td>
                                        <td>{{$equipo->created_at}}</td>
                                        <td>{{$equipo->updated_at}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="componentes" role="tabpanel"  aria-labelledby="componentes-tab">
                    <div class="form-group">
                        <table id="componentetabla" name="componentetabla" class="datos" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Codigo del componente</th>
                                    <th>Marca</th>
                                    <th>Serial del componente</th>
                                    <th>Estado</th>
                                    <th>Tarjeta de red</th>
                                    <th>IP</th>
                                    <th>MAC</th>
                                    <th>Tipo</th>
                                    <th>Pertenece al equipo</th>
                                    <th>Fecha de Creación</th>
                                    <th>Fecha de Actualización</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tcomponentes as $componente)
                                    <tr>
                                        <td>{{$componente->codigo_componente}}</td>
                                        <td>{{$componente->marca}}</td>
                                        <td>{{$componente->serial}}</td>
                                        <td>{{$componente->ACTIVO}}</td>
                                        <td>{{$componente->tarjeta_red}}</td>
                                        <td>{{$componente->ip}}</td>
                                        <td>{{$componente->mac}}</td>
                                        <td>{{$componente->id_tipo_componente}}</td>
                                        <td>{{$componente->id_equipo}}</td>
                                        <td>{{$componente->created_at}}</td>
                                        <td>{{$componente->updated_at}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="sistemas" role="tabpanel"  aria-labelledby="sistemas-tab">
                    <div class="form-group">
                        <table id="sistematabla" name="sistematabla" class=" datos" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nombre del Sistema</th>
                                    <th>Fecha de Creación</th>
                                    <th>Fecha de Actualización</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tsistemas as $sistema)
                                    <tr>
                                        <td>{{$sistema->nombre}}</td>
                                        <td>{{$sistema->created_at}}</td>
                                        <td>{{$sistema->updated_at}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="direccion" role="tabpanel"  aria-labelledby="direccion-tab">
                    <div class="form-group">
                        <table id="direcciontabla" name="direcciontabla" class="datos" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nombre de la Dirección</th>
                                    <th>Estado</th>
                                    <th>Fecha de Creación</th>
                                    <th>Fecha de Actualización</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tdirecciones as $direccion)
                                    <tr>
                                        <td>{{$direccion->direccion}}</td>
                                        <td>{{$direccion->ACTIVO}}</td>
                                        <td>{{$direccion->created_at}}</td>
                                        <td>{{$direccion->updated_at}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $('.datos').DataTable();   
        });
    </script>
@endsection

