<div class="container card-container">
    <div class="row">
        <div class="card-group">
            <div class="col-sm-4">
                <div class="card">
                    <h5 class="card-title card-header">Reserva !</h5>
                    <div class="card-body">
                        <p class="card-text">Has una reserva para ensayar con tu banda</p>
                        <form id="form-reserva" method="post">
                            @csrf
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                            <fieldset>
                                    @component('layouts.modal')
                                    @slot('modal') modal-contacto @endslot
                                    @slot('title') ¿A quien llamamos? @endslot
                                    @slot('content')
                                        <p>Para no hacer esto cada vez que reserves, <strong>registrate</strong></p>
                                        <div class="form-group">
                                            <label for="contacto"><strong>Numero de telefono</strong></label>
                                            <input class="form-control" id="contacto" type="tel" name="contacto">
                                        </div>
                                        <div class="form-group">
                                            <label for="nombre-contacto"><strong>Nombre</strong></label>
                                            <input class="form-control" id="nombre-contacto" type="tel" name="nombre">
                                        </div>
                                        <input class="btn btn-warning" type="submit" value="Reservar">
                                    @endslot
                                @endcomponent
                                <div class="form-group">
                                    <label for="fecha"><strong>¿Cuando?</strong></label>
                                    <select class="form-control" id="fecha" name="fecha">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="horas"><strong>¿A qué hora?</strong></label>
                                    <select class="form-control" id="horas" name = "hora">
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="duracion"><strong>¿Cuanto tiempo?</strong></label>
                                    <br>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-outline-warning active" id="r1">
                                        <input type="radio" name="duracion" id="radio1" autocomplete="off" value="1" checked> 1 hora
                                    </label>
                                    <label class="btn btn-outline-warning" id="r2">
                                        <input type="radio" name="duracion" id="radio2" autocomplete="off" value="2"> 2 horas
                                    </label>
                                    </div>
                                </div>
                                
                                @auth
                                    @if(count($usuario->bandas) > 0) 
                                        <label for="select-bandas"><strong>Elige una de tus bandas</strong></label>
                                        <select id="banda_id" class="form-control" name="banda_id">
                                            @foreach ($usuario->bandas as $banda)
                                                <option value="{{ $banda->id }}">{{ $banda->nombre }}</option>
                                            @endforeach
                                                <option value="1">otra ..</option>
                                        </select>
                                    @endif
                                @endauth
                                @guest
                                    <input type="hidden" id="banda_id" value="1">
                                @endguest
                                <br>
                                <button id="reservar" class="btn btn-primary">Reservar</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <h5 class="card-header">Registra tu banda</h5>
                    <div class="card-body">
                        @auth
                            <p class="card-text">¿Tienes una banda?
                                <strong> registrala y </strong>
                                comparte sus canciones e info en redes sociales!
                            </p>
                            <form id="form-nueva-banda" action="{{ route('bandas.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="nombre"><strong>Nombre</strong></label>
                                    <input class="form-control" id="banda-nombre" placeholder="nombre" name="nombre" type="text" required>
                                </div>
                                <div class="form-group">
                                    <label for="bio"><strong>Info </strong> (puedes dejar este campo vacio)</label>
                                    <p>añade una pequeña descripción de tu banda</p>
                                    <input class="form-control" id="banda-bio" placeholder="Info ..." name="bio" type="area">
                                </div>
                                <button class="btn btn-primary">Registrar</button>
                            </form>
                        @else
                            <p class="card-text">Inicia sesion para registrar tu banda.</p>
                            <a href="#auth" class="btn btn-primary">Inicar sesion</a>
                        @endauth
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <h5 class="card-header">Cursos</h5>
                    <div class="card-body ">
                        <p class="card-text">La sala de ensayo te ofrece clases y cursos.
                            <strong>Busca el tuyo!</strong>
                        </p>
                        <div class="form-group">
                            <input class="form-control" type="text">
                            <span><i class="fa fa-search"></i></span>
                        </div>       
                        <a href="#" class="btn btn-primary">Buscar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/menu.js" ></script>