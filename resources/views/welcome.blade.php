@php
    try{
		$bandas = (new App\banda)->bandas();
		$usuario = Auth::user();
	}catch(Exception $e){
		$bandas = [];
		$usuario = new App\usuario;
	}
@endphp
<!DOCTYPE html>
<html lang="esp" >
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="UTF-8">
        <!--====== TITLE TAG ======-->
        <title>J K F</title>

        <!--====== FAVICON ICON =======-->
        <link rel="shortcut icon" type="img/ico" href="img/drumstick.png" />

        <!--====== STYLESHEETS ======-->
        <link href="css/plugins/bootstrap.min.css" rel="stylesheet">
        <script src="js/vendor/jquery.js"></script>
        <script src="js/vendor/popper.min.js"></script>
        <script src="js/vendor/bootstrap.min.js"></script>

        <!-- jsCalendar style -->
        <link rel="stylesheet" type="text/css" href="js/jsCalendar/jsCalendar.css">
        <!-- jsCalendar script -->
        <script type="text/javascript" src="js/jsCalendar/jsCalendar.js"></script>
        <script type="text/javascript" src="js/jsCalendar/jsCalendar.lang.es.js"></script>


        <link rel="stylesheet" href="fonts/fontawesome-webfont.svg">

        <link rel="stylesheet" href="css/theme.css"/>
        
    </head>
    <body>
    <!-- Material theme -->
        <div class="article">
            <div class="container-background">
                <div class="banner">
                    <div class="jumbotron ">
                        <div class="title" style="font-size:1.8rem;">
                            <p>Bienvenido al estudio y sala de ensayo</p>
                            <h1 style="font-size:3rem;">
                                                            J
                                <div style="color:orange">K</div>
                                                            F
                            </h1>
                        </div>
                    </div>

                    @include('layouts.menu.menu')
                </div>

                @isset($bandas)
                    @if (count($bandas)>0)
                    <div class="container" style="margin:60px auto 60px auto">
                        <div class="card">
                            <div class="card-header">
                                Bandas
                            </div>
                            <div class="card-body">
                                <div class="container">
                                    @foreach ($bandas as $banda)
                                            <a id="tag-banda" class="btn btn-outline-success @if(\App\usuario::from_user($banda))from-user @endif" banda_id="{{ $banda->id }}">
                                                {{ $banda->nombre }}
                                            </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    </section>
                    @endif
                @endisset
            </div>
        </div>

        @include('layouts.fab.fab')

        <div>
            @component('layouts.modal')
                @slot('modal') calendar-modal @endslot
                @slot('title') Tus reservas @endslot
                @slot('content')
                <div class="container">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action active">
                            Horas
                        </a>
                        <div id="horas-ensayo">
                            <a href="#" class="list-group-item list-group-item-action">No tienes ningún ensayo para hoy</a>
                        </div>
                    </div>
                </div>
                    <center>
                        <!-- Material theme -->
                        <div style="margin-top:15px" id="my-calendar" class="auto-jsCalendar material-theme orange"
                            data-language="es"></div>
                    </center>

                @endslot
            @endcomponent
            <div id="modal-ajax"></div>
            @auth
                @component('layouts.usuarios.perfil', ['usuario' => Auth::user()])
                @endcomponent
            @endauth
            @guest
                @component('layouts.modal')
                    @slot('modal') auth-modal @endslot
                    @slot('title') Inicia sesión @endslot
                    @slot('content')
                        @include('layouts.auth.login')
                    @endslot

                @endcomponent

                @component('layouts.modal')
                    @slot('modal') register-modal @endslot
                    @slot('title') Registrate @endslot
                    @slot('content')
                        @include('layouts.auth.sign-up')
                    @endslot
                @endcomponent
            @endguest

            @component('layouts.modal')
                @slot('modal') about @endslot
                @slot('title') Sala de ensayo JKF @endslot
                @slot('content')
                    <p>
                        El estudio y sala de ensayo JKF es un espacio musical donde puedes traer a tus bandas y
                            <a href="#reservar" data-dismiss="modal" aria-label="Close">
                                ensayar con ellas
                            </a>.
                        <br>
                        Tambien puedes grabar las canciones que quieras <strong>profesionalmente</strong>.
                    </p>
                    <br>
                    <center>Ah, porsupuesto ...
                    <br>
                        <h3 style="color:orange"> Tambien damos cursos musicales </h3>
                    <br>
                    </center>
                @endslot
            @endcomponent
            
        </div>

        <script src="js/bandas.js"></script>
        <script src="js/app.js"></script>
        <script>
            @isset($mensaje)
                Snackbar.show({pos: 'bottom-left', text: '{{ $mensaje }}' });
            @endisset
        </script>

    </body>
</html>
