<div class="container">
    <div class="card card-banda">
        <div class="card-header">
            <h3>{{ $banda->nombre }}</h3>
            <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Editar nombre...">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="button-nombre-editar">editar</button>
                <button class="btn btn-outline-warning" type="button" id="button-nombre-cancelar">cancelar</button>
            </div>
            </div>
        </div>
        <div class="card-body">
                <h5 style="margin-top:10px;">Info</h5>
                @if($banda->bio !== null)
                    <div class="input-group mb-3">
                        <input type="area" class="form-control" placeholder="Editar info">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="button-bio-editar">editar</button>
                            <button class="btn btn-outline-warning" type="button" id="button-bio-cancelar">cancelar</button>
                        </div>
                    </div>
                @else
                    <p class="banda-bio">
                        {{ $banda->bio }} 
                    </p>
                @endif

                <h4>Canciones</h4>
        
                <div class="canciones">
                    <ul class="lista-de-canciones list-group list-group-flush">
                        @foreach ($banda->canciones as $cancion)
                        <li class="list-group-item">
                            nombre: <a href="{{ $cancion["link"] }}"><p>{{ $cancion["nombre"] }}</p></a>
                        </li>
                        @endforeach
                    </ul>

                    <button type="button" id="btn-show"
                        class="btn btn-warning btn-show">
                        añadir cancion
                    </button>

                    <div id="nueva-cancion" class="container" style="display: none; margin-left: -10px;">
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
                    

        </div>

    </div>
</div>