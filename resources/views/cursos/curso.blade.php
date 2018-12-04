@component('layouts.modal')
    @slot('modal') m-c-curso @endslot
    @slot('title') {{ $curso->nombre }} @endslot
    @slot('content')
        <div class="card-body">
                <h5 style="margin-top:10px;">Descripcion</h5>
                <p class="banda-bio">
                    @if($curso->descripcion == null) ... <br> @else {{ $curso->descripcion }} @endif
                </p>
                <h4>Tags</h4>
                <div class="tags">
                    @if(false)
                            @foreach ($curso->temas as $tema)
                                <span class="badge badge-pill badge-primary">$tema->nombre</span>
                            @endforeach
                    @else
                        <li class="list-group-item">
                            No hay Tags
                        </li>
                    @endif
                </div>
                <div id="archivos">
                    <form id="guardar-recursos" method="put" action="cursos/{{ $curso->id }}" curso_id="{{ $curso->id }}">
                        @csrf
                        <label style="margin-top:10px">Subir recursos: (imagenes, videos, partituras)</label>
                        <input name="photos" type="file" multiple style="margin:10px 0;" curso_id="{{$curso->id}}" class="btn btn-info" text="subir recursos"/>
                        <button type="submit" class="btn btn-warning" > Guardar </button>
                    </form>
                </div>
                <script>
                    $('#guardar-recursos').submit((e) => {
                        e.preventDefault(); // avoid to execute the actual submit of the form.

                        var c_id = {{$curso->id}};
                        var form = $(this);
                        var url = 'admin/cursos/'+c_id;

                        $.ajaxSetup({
                            headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $.ajax({
                            type: "PUT",
                            url: url,
                            data: form.serialize(), // serializes the form's elements.
                            success: (response) => {
                                response = JSON.parse(response);
                                alert(response);
                            },
                            error: (e) => {
                                console.log(e);
                            }
                        });

                    });
                </script>
        </div>
    @endslot
@endcomponent
