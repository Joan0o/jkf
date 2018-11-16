@if(count($bandas) > 0)
    <section id="bandas">
        <div id="division">
                <div class="division">
                    <h2>Nuestras bandas</h2>
                </div>
        </div>
        <div class="container">
            <div class="card-columns card-banda-group">
                @foreach ($bandas as $banda)
                    @auth
                        @php
                            $same = false; 
                        @endphp
                        @foreach ($bandas_usuario as $banda_usuario)
                            @if ($banda_usuario == $banda)
                                @php $same = true; @endphp
                            @endif
                        @endforeach
                        @if ($same)
                            <div class="container">
                                    <div class="card card-banda">
                                        <div class="card-header">
                                            <h3>{{ $banda->nombre }}</h3>
                                        </div>
                                        <div class="card-body">
                                                <h5 style="margin-top:10px;">Info</h5>
                                                <p class="banda-bio">
                                                    @if($banda->bio !== null) ... <br> @else {{ $banda->bio }} @endif
                                                </p>

                                                <h4>Canciones</h4>
                                        
                                                @if(count($banda->canciones) > 0)
                                                    <div class="canciones">
                                                        <ul class="lista-de-canciones list-group list-group-flush">
                                                            @foreach ($banda->canciones as $cancion)
                                                            <li class="list-group-item">
                                                                nombre: <a href="{{ $cancion["link"] }}"><p>{{ $cancion["nombre"] }}</p></a>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @else
                                                    No hay canciones
                                                @endif
                                                
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
                                    </div>
                            </div>
                        @endif
                    @else
                        <div class="container">
                                        <div class="card card-banda">
                                            <div class="card-header">
                                                <h3>{{ $banda->nombre }}</h3>
                                            </div>
                                            <div class="card-body">
                                                    <h5 style="margin-top:10px;">Info</h5>
                                                    <p class="banda-bio">
                                                        @if($banda->bio !== null) ... <br> @else {{ $banda->bio }} @endif
                                                    </p>

                                                    <h4>Canciones</h4>
                                            
                                                    @if(count($banda->canciones) > 0)
                                                        <div class="canciones">
                                                            <ul class="lista-de-canciones list-group list-group-flush">
                                                                @foreach ($banda->canciones as $cancion)
                                                                <li class="list-group-item">
                                                                    nombre: <a href="{{ $cancion["link"] }}"><p>{{ $cancion["nombre"] }}</p></a>
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @else
                                                        No hay canciones
                                                    @endif
                                                    
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
                                        </div>
                        </div>
                    @endauth
                @endforeach 
            </div>
        </div>
    </section>
@endif