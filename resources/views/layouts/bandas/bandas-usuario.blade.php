@if(count($bandas_usuario) > 0)
    <section id="bandas-usuario">
            <div id="division">
                <div class="division">
                    <h2>Tus bandas</h2>
                </div>
            </div>

            <div class="container">
                    <div class="card-columns card-banda-group">
                            @foreach ($bandas_usuario as $banda)
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

                    </div>
            </div>
    </section>
@endif
