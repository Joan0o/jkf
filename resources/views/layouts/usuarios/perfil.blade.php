@auth


<!-- Modal -->

<div class="modal fade" id="perfil" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <div style="display:block; padding-left: 20px;">

            <h5 class="modal-title">
                Usuario
              </h5>

            </div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
      <div class="modal-body">
        <form id="form-perfil" enctype="multipart/form-data" action="{{ route('usuario.update', Auth::id() ) }}" method="post" >
                @csrf
                <div class="form-group">
                    <label >Cambiar foto de perfil</label>
                    <input type="file" id="user-img" class="form-control-file" name="foto">
                </div>
                    @php
                        
                        if(isset(Auth::user()->foto)){
                            $route = '/avatars/'.Auth::user()->foto;
                        }else{
                            $route = "/img/bigprofile.png";
                        }
                    @endphp
                    <img src="{{ $route }}" id="modal-perfil-foto" class="img-thumbnail" style="width:150px; heigth:150px;"><br><br>
                    <div id="image_preview"><img id="previewing" class="img-thumbnail" src="noimage.png" /></div>

                <h5 >
                    {{ $usuario->nombre }}
                </h5>
                <input id="modal-perfil-nombre" type="area" placeholder="Editar nombre" value="{{ $usuario->nombre }}" class="form-control" name="nombre" onkeyup="validate_name()" required>
                <br>
                <div class="form-group">
                    <label for="tel">Numero de telefono</label>
                    <input id="tel" id="celular" value="{{ Auth::user()->celular }}" type="number" placeholder="numero" class="form-control" name="celular">
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
<div id="message"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>



@endauth

<script>
    function validate_name(){
        var x = document.getElementById("modal-perfil-nombre");
        if(x.length < 5){
            $(x).css({ "border": '#FF0000 1px solid'});
        }
    }
</script>
