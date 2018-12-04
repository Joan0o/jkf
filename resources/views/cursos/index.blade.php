@php
    $cursos = DB::table('curso')->orderBy('updated_at', 'DESC')->get();
@endphp
<div class="curso-wrapper">
    <div class="buscar">
        <div class="card buscar">
        <h5 class="card-header">Buscar cursos</h5>
        <div class="card-body ">
            <div class="form-group">
                <input class="form-control" type="text" id="buscar-cursos" name="query">
                <span><i class="fa fa-search"></i></span>
            </div>
            <button id="buscar-curso-btn" class="btn btn-primary">Buscar</button>
        </div>
    </div>
    <form class="nuevo" action="{{route('cursos.store')}}" method="post" style="margin:23px 0;">
        @csrf
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right"> Nombre </label>

                    <div class="col-md-6">
                        <input placeholder="nombre" id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="nombre" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="descripcion" class="col-md-4 col-form-label text-md-right"> Descripcion </label>

                    <div class="col-md-6">
                        <input placeholder="descripcion" id="descripcion" type="area" class="form-control" name="descripcion" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="correo" class="col-md-4 col-form-label text-md-right"> Temas </label>

                    <div class="col-md-6">
                        <input placeholder="Describe el curso en tags cortos separados por espacios" id="temas" type="area" class="form-control" name="temas" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-info">Crear</button>

    </form>
    <div class="curso">
       <div class="card curso" style="margin:auto;">
        @isset($cursos)
            @if(count($cursos) > 0)
                @foreach($cursos as $curso)
                    <div class="rounded" style="min-width:200px; max-width:400px; background-color:#ccccccd1; margin-top:30px; padding:5px 10px 26px 33px;">
                        <h2>{{$curso->nombre}}</h2>
                        <div class="">
                            <p>{{$curso->descripcion}}</p>
                        </div>
                        <button type="button" style="float:right; margin:10px;" curso_id="{{$curso->id}}" class="btn btn-info info-curso">info</button>
                        
                        <button type="button" style="float:right; margin:10px;" curso_id="{{$curso->id}}" class="btn btn-danger">Eliminar</button>
                    </div>
                @endforeach
            @endif
        @endisset
    </div>
</div>
<div id="modal-ajax"></div>

<script>

var selected = -1;
var cursos;

function autocomplete(inp, arr) {
    /*the autocomplete function takes two arguments,
    the text field element and an array of possible autocompleted values:*/
    var currentFocus;
    inp.addEventListener("input", function (e) {
        var a, b, i, val = this.value;
        closeAllLists();
        if (!val) { return false; }
        currentFocus = -1;
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");
        this.parentNode.appendChild(a);
        for (i = 0; i < arr.length; i++) {
            if (arr[i].nombre.substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                b = document.createElement("DIV");
                b.innerHTML = "<strong>" + arr[i].nombre.substr(0, val.length) + "</strong>";
                b.innerHTML += arr[i].nombre.substr(val.length);
                b.innerHTML += "<input class='n' type='hidden' value='" + arr[i].nombre + "'>";
                b.innerHTML += "<input class='s' type='hidden' value='" + arr[i].id + "'>";
                b.addEventListener("click", function (e) {
                    inp.value = $(this).children('.n').val();
                    selected = $(this).children('.s').val();
                    closeAllLists();
                });
                a.appendChild(b);
            }
        }
    });
    /*execute a function presses a key on the keyboard:*/
    inp.addEventListener("keydown", function (e) {
        selected = -1;
        var x = document.getElementById(this.id + "autocomplete-list");
        if (x) x = x.getElementsByTagName("div");
        if (e.keyCode == 40) {
            /*If the arrow DOWN key is pressed,
            increase the currentFocus variable:*/
            currentFocus++;
            /*and and make the current item more visible:*/
            addActive(x);
        } else if (e.keyCode == 38) { //up
            /*If the arrow UP key is pressed,
            decrease the currentFocus variable:*/
            currentFocus--;
            /*and and make the current item more visible:*/
            addActive(x);
        } else if (e.keyCode == 13) {
            /*If the ENTER key is pressed, prevent the form from being submitted,*/
            e.preventDefault();
            if (currentFocus > -1) {
                /*and simulate a click on the "active" item:*/
                if (x) x[currentFocus].click();
            }
        }
    });
    function addActive(x) {
        /*a function to classify an item as "active":*/
        if (!x) return false;
        /*start by removing the "active" class on all items:*/
        removeActive(x);
        if (currentFocus >= x.length) currentFocus = 0;
        if (currentFocus < 0) currentFocus = (x.length - 1);
        /*add class "autocomplete-active":*/
        x[currentFocus].classList.add("autocomplete-active");
    }
    function removeActive(x) {
        /*a function to remove the "active" class from all autocomplete items:*/
        for (var i = 0; i < x.length; i++) {
            x[i].classList.remove("autocomplete-active");
        }
    }
    function closeAllLists(elmnt) {
        /*close all autocomplete lists in the document,
        except the one passed as an argument:*/
        var x = document.getElementsByClassName("autocomplete-items");
        for (var i = 0; i < x.length; i++) {
            if (elmnt != x[i] && elmnt != inp) {
                x[i].parentNode.removeChild(x[i]);
            }
        }
    }
    /*execute a function when someone clicks in the document:*/
    document.addEventListener("click", function (e) {
        closeAllLists(e.target);
    });
}

$(function() {
    $.get('curso/buscar', function (r) {
        cursos = JSON.parse(r);
        autocomplete(document.getElementById("buscar-cursos"), cursos);
    });
    function modal(e, i){
        e.preventDefault();
        if(i != -1){
            $.ajax({
                type: "get",
                url: 'cursos/'+i,
                dataType: "html",
                success: function (response) {
                    $('#modal-ajax').html(response);
                    $('#m-c-curso').modal();
                },
                error: function (e) {
                    console.log(e);
                }
            })
        }
    }
    $('.info-curso').click( (e) => {
        modal(e, $(e.currentTarget).attr('curso_id'));
    })
    $('#buscar-curso-btn').click((e) => {
        modal(e, selected);
    })
})
</script>
