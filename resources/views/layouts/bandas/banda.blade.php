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
                <h5>Canciones</h5><br>
        
                <div id="lista-de-canciones">
                    @include('layouts.bandas.pills', ['collection' => $banda->canciones])
                </div>

                <button type="button" id="btn-show-cancion"
                    class="btn btn-warning btn-show">
                    añadir cancion
                </button>
        
                <div id="nueva-cancion" style="display: none; margin-left: -10px;">
                    <div class="nueva-cancion">
                        <label>Nombre de la cancion</label>
                        <input id="cancion_nombre" class="form-control" name="cancion-nombre" type="text" placeholder="Nombre de la canción..."/>
                        <input id="banda_id" value="{{ $banda->id }}" type="hidden">

                        <div class="añadir">
                            <div class="input-group" >
                                <label>Links</label>
                                <input name="link" id="link-cancion" type="text" class="form-control" placeholder="Link ... (youtube, soundcloud)">
                            </div>
                        </div>
                        <br>
                        <div style="margin-top: 10px;">
                            <input name="banda" type="hidden" value="{{ $banda->id }}">
                            <button class="btn btn-warning btn-nueva-cancion">
                                añadir
                            </button>
                            <a class="btn btn-outline-danger" id="btn-close">
                                cancelar </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="integrantes"><br>
                <h5 style="margin-top:10px;">Integrantes</h5>
<br>
                <div class="hpm">
                    @include('layouts.bandas.pills', ['collection' => $banda->integrantes])
                </div>

                <button type="button" id="btn-show-integrantes"
                            class="btn btn-warning btn-show">
                        añadir un integrante
                </button>
                <div id="nuevo-integrante" class="container" style="display: none; margin-left: -10px; margin-top:20px;">
                    <select name="integrante" class="form-control" id="select-integrante">
                        @php
                            $users = \DB::select('select * from usuario where id <> 5 and id <> '.Auth::id());
                        @endphp
                        @foreach ($users as $usuario)
                            <option value="{{ $usuario->id }}"> {{ $usuario->nombre }} </option>
                        @endforeach
                    </select>
                    <div style="margin-top: 10px;">
                        <input name="banda" type="hidden" value="{{ $banda->id }}">
                        <button class="btn btn-warning btn-nuevo-integrante">
                            añadir
                        </button>
                        <a class="btn btn-outline-danger" id="btn-close">
                            cancelar </a>
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
                        <br>

                        <div class="canciones">
                            @if(count($banda->canciones) > 0)
                                <div class="hpm">
                                    @include('layouts.bandas.pills', ['collection' => $banda->canciones])
                                </div>
                            @else
                                <li class="list-group-item">
                                    No hay canciones
                                </li>
                            @endif
                        </div>
                        
                        <div class="integrantes">
                                <h5 style="margin-top:10px;">Integrantes</h5>
                                <div class="integrantes">
                                            <div class="hpm">
                                                @include('layouts.bandas.pills', ['collection' => $banda->integrantes])
                                            </div>
                                </div>
                        </div>
                </div>
        @endslot
    @endcomponent
@endif

