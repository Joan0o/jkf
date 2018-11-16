<ul class="lista-de-canciones list-group list-group-flush">
        @foreach ($banda->canciones as $cancion)
        <li class="list-group-item">
            <p>nombre: <a href="{{ $cancion["link"] }}"><p>{{ $cancion["nombre"] }}</p></a>
        </p></li>
        @endforeach
    </ul>