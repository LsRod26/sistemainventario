<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('titulo')</title>
    <link href="/css/app.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
</head>
<body>
    <div class="d-flex flex-row">
        <aside class="min-vh-100 bg-dark">
            <nav class="navbar navbar-expand navbar-dark bg-dark flex-md-column flex-row align-items-start py-2">
                <div class="collapse navbar-collapse ">
                    <ul class="flex-md-column flex-row navbar-nav w-100 justify-content-between">
                        <li class="nav-item">
                            <a class="nav-link pl-0 text-nowrap" href={{ route('home') }}>
                                <span class="d-none d-md-inline">Home</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-0 text-nowrap " href={{ route('buscar') }}>
                                <span class="d-none d-md-inline">Buscar</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-0 text-nowrap" href={{ route('direccion.create') }}>
                                <span class="d-none d-md-inline">Registrar Direcciones</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-0 text-nowrap" href={{ route('sistema.create') }}>
                                <span class="d-none d-md-inline">Registrar Sistemas</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-0 text-nowrap" href={{ route('funcionario.create') }}>
                                <span class="d-none d-md-inline">Registrar Funcionarios</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-0 text-nowrap" href={{ route('equipo.crear') }}>
                                <span class="d-none d-md-inline">Registrar Equipos</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-0 text-nowrap" href={{ route('tipocomponente.crear') }}>
                                <span class="d-none d-md-inline">Registrar Tipo de Componentes</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-0 text-nowrap" href={{ route('componente.crear') }}>
                                <span class="d-none d-md-inline">Registrar Componentes</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-0 text-nowrap" href={{ route('asignar.funcionariosistema') }}>
                                <span class="d-none d-md-inline">Asignar Sistemas a Funcionarios</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-0 text-nowrap" href={{ route('componente.asignarequipo') }}>
                                <span class="d-none d-md-inline">Asignar Componentes a Equipos</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-0 text-nowrap" href={{ route('asignar.funcionarioequipo') }}>
                                <span class="d-none d-md-inline">Asignar Equipos a Funcionarios</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </aside>
        <div class="col">
            @yield('contenido')

            @yield('script')
        </div>
    </div>
</html>