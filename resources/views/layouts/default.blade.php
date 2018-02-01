<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Central dos Leads | Sistema de Gestão de Leads.</title>
    <link href="/build/css/sea-admin.css" rel="stylesheet">
    @yield('extra-css')
</head>
<body>
<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong
                                            class="font-bold">{{ session('user')['name'] }}</strong>
                             </span> <span class="text-muted text-xs block">CEO <b
                                            class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="#">Sair</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        CL
                    </div>
                </li>
                @include('components._navmenu')
            </ul>
        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg">
        @include('components._topmenu')

        @yield('content')

        @include('components._footermenu')
    </div>
</div>

<!-- Mainly scripts -->
<script src="/build/js/sea-admin.js"></script>
@yield('extra-scripts')
</body>

</html>