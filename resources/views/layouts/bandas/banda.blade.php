@if ($from_user)
    @component('layouts.modal')
        @slot('modal') m-c-banda @endslot
        @slot('title') 
            <div id="modal-banda-nombre">
                {{ $banda->nombre }} 
            </div> 
        @endslot
        @slot('edit')
            <form action="{{ route('bandas.update', $banda->id) }}" method="patch" class="form-editar-banda" >
                @csrf
                <input type="hidden" name="banda_id" value="{{$banda->id}}">
                <div class="input-group mb-3">
                    <input type="area" class="form-control" placeholder="Editar nombre" name="nombre" required>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" id="button-bio-editar">editar</button>
                    </div>
                </div>
            </form>
        @endslot
        @slot('content')
        <div class="card-body">
            <h4 style="margin-top:10px;">Info</h4>
            <p class="form-group" id="modal-banda-bio">
                {{ $banda->bio }} 
            </p>
            <form action="{{ route('bandas.update', $banda->id) }}" method="PUT" class="form-editar-banda">
                @csrf
                <input type="hidden" name="banda_id" value="{{$banda->id}}">
                <div class="input-group mb-3">
                    <input type="area" class="form-control" placeholder="Editar info" name="bio" required>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" id="button-bio-editar">editar</button>
                    </div>
                </div>
            </form>
            <div class="canciones">
                <h5>Canciones</h5>
        
                <div id="lista-de-canciones">
                    @include('layouts.bandas.cancion', ['banda' => $banda])
                </div>

                <button type="button" id="btn-show"
                    class="btn btn-warning btn-show">
                    añadir cancion
                </button>
        
                <div id="nueva-cancion" style="display: none; margin-left: -10px;">
                    <div class="nueva-cancion">
                        <label>Nombre de la cancion</label>
                        <input class="form-control" name="nombre" type="text" placeholder="Nombre de la canción..."/>
                        <input id="banda_id" value="{{ $banda->id }}" type="hidden">

                        <div class="añadir">
                            <div class="link--{{ $banda->id }}">
                                <div class="input-group" >
                                    <label>Links</label>
                                    <input name="link" type="text" class="form-control" placeholder="Link ... (youtube, soundcloud)">
                                </div>
                            </div>
                            <button data-id="{{ $banda->id }}" class="btn btn-secondary btn-añadir-link" type="button">+</button>
                        </div>
                        <br>
                        <div style="margin-top: 10px;">
                            <input name="banda" type="hidden" value="{{ $banda->id }}">
                            <button class="btn btn-warning btn-nueva-cancion">
                                añadir
                            </button>
                            <a class="btn btn-outline-danger" id="btn-show">
                                cancelar </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="integrantes">
                <h5 style="margin-top:10px;">Integrantes</h5>
                <div class="integrantes">
                    <ul class="list-group list-group-flush">
                        @foreach ($banda->integrantes as $integrante)
                        <li class="list-group-item">
                                <a href="">{{ $integrante->nombre }}</a>
                            </li> 
                        @endforeach
                    </ul>
                    
                </div>
                <button type="button" id="btn-show"
                            class="btn btn-warning btn-show">
                        añadir un integrante
                </button>
                <div id="nuevo-integrante" class="container" style="display: none; margin-left: -10px;">
                        <div class="nueva-cancion">
                            <label>Nombre de la cancion</label>
                            <input class="nombre-cancion" name="nombre" type="text" placeholder="Nombre de la canción..."/>
                            <input id="banda_id" value="{{ $banda->id }}" type="hidden">
                            <div class="añadir">
                                <div class="autor--{{ $banda->id }}">
                                    <div class="input-group">
                                        <label>Autor o autores</label>
                                        <input name="autor" type="text" class="form-control" placeholder="Autor...">
                                    </div>
                                </div>
                                <button data-id="{{ $banda->id }}" class="btn btn-secondary btn-añadir-autor" type="button">Añadir autor</button>
                            </div>
                            <div class="añadir">
                                <div class="link--{{ $banda->id }}">
                                    <div class="input-group" >
                                        <label>Links</label>
                                        <input name="link" type="text" class="form-control" placeholder="Link ... (youtube, soundcloud)">
                                    </div>
                                </div>
                                <button data-id="{{ $banda->id }}" class="btn btn-secondary btn-añadir-link" type="button">Añadir link</button>
                            </div>
                            <br>
                            <div class="card"></div>
                            <div style="margin-top: 10px;">
                                <input name="banda" type="hidden" value="{{ $banda->id }}">
                                <button class="btn btn-warning btn-nueva-cancion">
                                    añadir
                                </button>
                                <a class="btn btn-outline-danger" id="btn-show">
                                    cancelar </a>
                            </div>
                        </div>
                </div>
            </div>
            <br>
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <button id="btn-eliminar-banda" data-dismiss="modal" banda_id="{{ $banda->id }}" class="btn btn-danger">Eliminar banda</button>
        </div>
        @endslot
    @endcomponent
@else
    @component('layouts.modal')
        @slot('modal') m-c-banda @endslot
        @slot('title') {{ $banda->nombre }} @endslot
        @slot('content')
                <div class="card-body">
                        <h5 style="margin-top:10px;">Info</h5>
                        <p class="banda-bio">
                            @if($banda->bio == null) ... <br> @else {{ $banda->bio }} @endif
                        </p>
                        
                        <h4>Canciones</h4>

                        <div class="canciones">
                            <ul class="lista-de-canciones list-group list-group-flush">
                            @if(count($banda->canciones) > 0)
                                    @foreach ($banda->canciones as $cancion)
                                    <li class="list-group-item">
                                        nombre: <a href="{{ json_encode($cancion['links'])[0] }}"><p>{{ $cancion["nombre"] }}</p></a>
                                    </li>
                                    @endforeach
                            @else
                                <li class="list-group-item">
                                    No hay canciones
                                </li>
                            </ul>
                            @endif
                        </div>
                        
                        <div class="integrantes">
                                <h5 style="margin-top:10px;">Integrantes</h5>
                                <div class="integrantes">
                                    <ul class="list-group list-group-flush">
                                        @foreach ($banda->integrantes as $integrante)
                                        <li class="list-group-item">
                                                <a href="">{{ $integrante->nombre }}</a>
                                            </li> 
                                        @endforeach
                                    </ul>
                                </div>
                        </div>
                </div>
        @endslot
    @endcomponent
@endif

