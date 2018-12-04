// e n v //
Date.prototype.DateToString = function () {
    t = new Date(this.valueOf());

    var dd = t.getDate();
    var mm = t.getMonth() + 1; //January is 0!
    var yyyy = t.getFullYear();

    if (dd < 10) {
        dd = '0' + dd
    }
    if (mm < 10) {
        mm = '0' + mm
    }
    today = yyyy + '-' + mm + '-' + dd;

    return today;
}
var horario = [];
var horas_reservadas = [];
var fecha = new Date();
var selected = -1;
var cursos;
var c_D = fecha.DateToString();
var modalAbierto = false;

$(document).ready(function () {

    var mañana = new Date();
    mañana.setDate(mañana.getDate() + 1)

    $('#fecha').append('<option value=' + fecha.DateToString() + '>hoy</option>');
    $('#fecha').append('<option value=' + mañana.DateToString() + '>mañana</option>');

    horas(fecha.DateToString(), fecha.DateToString(), duracion);

    $('#modal-contacto').on('hide.bs.modal', function () {
        $('#contacto').prop('required', false)
        $('#nombre-contacto').prop('required', false)
        modalAbierto = false;
    })
});
$(function () {
    $.get('curso/buscar', function (r) {
        cursos = JSON.parse(r);
        autocomplete(document.getElementById("buscar-cursos"), cursos);
    });
    $('#buscar-curso-btn').click((e) => {
        e.preventDefault();
        if (selected != -1) {
            location.hash = 'cursos-' + selected;
            $.ajax({
                type: "get",
                url: 'cursos/' + selected,
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
    })
})
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

// D O M //
$('#fecha').on('change', function () {
    c_D = $("#fecha option:selected").val();
    horas(c_D, fecha.DateToString(), duracion);
});
$('#horas').on('change', function () {
    duracion();
})
function showModal() {
    modalAbierto = true;
    $('#contacto').prop('required', true)
    $('#nombre-contacto').prop('required', true)
    $('#modal-contacto').modal();
}
function duracion() {
    var hora = $("#horas option:selected").val();
    var index = $("#horas option:selected")[0].index;
    var nh = $($('#horas option')[index + 1]).val();
    hora = hora.substring(hora.length - 3, hora.length);
    nh = (nh) ? nh.substring(nh.length - 3, nh.length) : -1;
    hora = parseInt(hora);
    nh = parseInt(nh);

    if (hora + 1 != nh)
        $('#r2').hide();
    else
        $('#r2').show();
}

function imageIsLoaded(e) {
    $("#user-img").css("color", "green");
    $('#image_preview').css("display", "block");
    $('#previewing').attr('src', e.target.result);
    $('#previewing').attr('width', '250px');
    $('#previewing').attr('height', '230px');
};

// A J A X //

function horas(date, today, callback = null) {

    horario = [];

    let hora_de_hoy = (date != today) ? 7 : fecha.getHours() + 1;
    if (hora_de_hoy < 7) {
        hora_de_hoy = 7;
    }

    for (let i = hora_de_hoy; i <= 20; i++) {
        horario[i - hora_de_hoy] = i;
    }

    if (horario.length > 0) {
        $('#reservar').prop('disabled', false);

        $("#horas").html('');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'get',
            url: 'ensayos/' + date,
            success: function (response) {
                try {
                    for (let i = 0; i < horario.length; i++) {
                        if (response) {
                            response.forEach((e, j) => {
                                if (e["hora"] == horario[i]) {
                                    i++;
                                    if (parseInt(e["duracion"]) > 1) {
                                        i++;
                                    }
                                }

                            });
                        }

                        if (i >= horario.length) {
                            return;
                        }

                        let hora = (horario[i] > 12) ? horario[i] - 12 + " pm" : horario[i] + " am";

                        $("#horas").append('<option value="' + horario[i] + '">' + hora + '</option>');
                    }
                } catch (error) {

                } finally {
                    if ($('#horas').has('option').length == 0) {
                        $("#horas").append('<option>Ya no puedes ensayar hoy, reserva mañana!</option>');
                        $('#reservar').prop('disabled', true);
                    }
                }

                if (callback) callback();
            }
        });
    } else {
        $("#horas").append('<option>Ya no puedes ensayar hoy, reserva mañana!</option>');

        $('#reservar').prop('disabled', true);
    }

}
$("#form-reserva").on('submit', function (e) {
    if (modalAbierto) {
        if ($('#contacto').val() == "" || $('#nombre-contacto').val() == "") {
            alert('Ocurrió un error');
            e.preventDefault()
            return;
        }
    }
    if ($('#banda_id').val() == "1" && !modalAbierto) {
        showModal();
        e.preventDefault();
        return;
    }

    form = $(this);
    var hora = parseInt($('#horas').val());
    var hora_final = parseInt($('#horas').val()) + parseInt($('[name="duracion"]:checked').val());

    hora = (hora > 12) ? hora - 12 + ' pm ' : hora + ' am ';
    hora_final = (hora_final > 12) ? hora_final - 12 + ' pm' : hora_final + ' am';


    if (!confirm('Confirmar reserva de sala desde' + ((hora == 1) ? ' la ' : ' las ')
        + hora + 'hasta' + ((hora == 1) ? ' la ' : ' las ')
        + hora_final)) {
        e.preventDefault();
        return;
    }

    $.post({
        url: "ensayos/reservar",
        data: form.serialize(), // serializes the form's elements.
        success: (success) => {
            $('#modal-contacto').modal('hide');
            Snackbar.show({ pos: 'bottom-left', text: success }); //Set the position

        },
        error: (error) => {
            Snackbar.show({ pos: 'bottom-left', text: 'error' }); //Set the position
        }
    });

    horas(c_D, fecha.DateToString());
    e.preventDefault();
})
$(function () {
    $("#user-img").change(function () {
        var file = this.files[0];
        var imagefile = file.type;
        var match = ["image/jpeg", "image/png", "image/jpg"];
        if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2]))) {
            $('#previewing').attr('src', 'noimage.png');
            $("#message").html("<p id='error'>Please Select A valid Image File</p>" + "<h4>Note</h4>" + "<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
            return false;
        }
        else {
            var reader = new FileReader();
            reader.onload = imageIsLoaded;
            reader.readAsDataURL(this.files[0]);
        }
    });
});
