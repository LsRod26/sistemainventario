<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('titulo')</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
   
    
</head>
<body>
    <nav>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/buscar">Buscar</a></li>
            <li><a href="/asignarfuncionariosistema/crear">Asignar Funcionario a sistema</a></li>
            <li><a href="/asignarfuncionarioequipo/crear">Asignar Funcionario a equipo</a></li>
            <li><a href="{{route('componente.asignarequipo')}}">Asignar Componentes a Equipo</a></li>
            <li><a href="/componente/crear">Registrar Componente</a></li>
            <li><a href="/funcionario/crear">Registrar Funcionario</a></li>
            <li><a href="/direccion/crear">Registrar Direcciones</a></li>
            <li><a href="/tipocomponente/crear">Registrar un tipo de componente</a></li> 
            <li><a href="/sistema/crear">Registrar un sistema</a></li>     
            <li><a href="/equipo/crear">Registrar un Equipo</a></li> 
                 
        </ul>
    </nav>
    @yield('contenido')

    @yield('script')

</body>
</html>