$(document).on('click', '.btn-nuevo-integrante', function (e) {

    var banda = $("#banda_id").val();
    var usuario = $('#select-integrante').val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.post({
        method: 'post',
        url: `bandas/${banda}/integrantes/nuevo/${usuario}`,
        dataType: "html",
        success: function (response) {
            $(".hpm").html(response);
            container = $('#nuevo-integrante');
            if (!$(container).is(":hidden"))
                $(container).hide();
        },
        error: function (err) {
            console.log(err)
        }
    });
});

$(document).on('click', '.btn-nueva-cancion', function (e) {

    var div_nuevaCancion = $('#nueva-cancion');

    var nombre = $("#cancion_nombre").val();
    var banda = $("#banda_id").val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    if ($(nombre).val() != '') {
        $.post({
            url: "canciones",
            data: {
                "nombre": nombre,
                "banda_id": banda,
                "links": $('#link-cancion').val(),
            },
            dataType: "html",
            success: function (response) {
                $(div_nuevaCancion).hide('slow');
                $("#lista-de-canciones").html(response);
            },
            error: function (err) {
                console.log(err)
            }
        });
    } else {
        e.preventDefault();
        $(nombre).toggleClass("error_campo", true);
    }

});

$(document).on('click', '#btn-show-cancion', function () {
    var container = $('#nueva-cancion');
    if ($(container).is(":hidden")) {
        $(container).show("slow");
    } else {
        $(container).hide("slow");
    }
});

$(document).on('click', '#btn-close', function () {
    var container = $('#nueva-cancion');
    if (!$(container).is(":hidden"))
        $(container).hide();
    container = $('#nuevo-integrante');
    if (!$(container).is(":hidden"))
        $(container).hide();
});

$(document).on('click', '#btn-show-integrantes', function () {
    var container = $('#nuevo-integrante');
    if ($(container).is(":hidden")) {
        $(container).show("slow");
    } else {
        $(container).hide("slow");
    }
});

$(document).on('click', '#btn-close', function () {
    var container = $('#nueva-cancion');
    if (!$(container).is(":hidden"))
        $(container).hide();
});

var element = document.getElementById("my-calendar");

// Create the calendar
var myCalendar = jsCalendar.new(element);


function lista_reservas(date) {
    var p_k = 0;

    $.get("/ensayos/" + date.DateToString(), function (data) {
        if (data) {
            $('#horas-ensayo').html('');
            data.forEach((e, i) => {
                hora = e['hora'];
                duracion = parseInt(hora) + parseInt(e['duracion']);

                if (hora > 12) {
                    hora = (hora - 12) + ' pm'; duracion = (duracion - 12) + ' pm'
                }

                var content = $('meta[name="csrf-token"]').attr('content');

                var ensayo_id = e['id'];
                var banda = e['nombre'];

                if (e['from_user'] == 'true') {
                    p_k++;
                    $("#horas-ensayo").append(
                        '<div class="list-group-item list-group-item-action">' +
                        'De ' + hora + ' a ' + duracion +
                        '<span class="badge badge-warning" style="margin-left:10px;">' + e['nombre'] + '</span>' +
                        '<input class="btn btn-danger btn-asunto" style="margin-left:30px" type="button" ensayo_id=' + ensayo_id + ' value="Cancelar">' +
                        '<form style="display:none" id="form-razon' + ensayo_id + '" action="ensayos/' + ensayo_id + '" method="post" class="form-group form-razon">' +
                        '<meta name="csrf-token" content="' + content + '">' +
                        '<input type="hidden" id="ensayo_id" value="">' +
                        '<input type="hidden" name="banda" value="' + banda + '">' +
                        '<p>No hay lio, cuentanos porqué no puedes asistir ...</p>' +
                        '<div class="form-group">' +
                        '<input type="text" class="form-control" placeholder="No puedo ..." id="razon" name="detalles">' +
                        '</div>' +
                        '<input class="btn btn-danger" type="submit" value="Eliminar reserva">' +
                        '<a style="display:inline; margin-left:30px" class="btn btn-outline-secondary btn-asunto">cancelar</a>' +
                        '</form>' +
                        '</div>'
                    );
                }

            })
            if (p_k == 0) {
                $("#horas-ensayo").append(
                    '<div class="list-group-item list-group-item-action">Ninguna de tus bandas tiene reservas registradas</div>');
            }
        }
    });
}

// Add events
myCalendar.onDateClick(function (event, date) {

    date = new Date(Date.parse(date.toString()));
    var s = '';

    newstr = date.DateToString().split('-');
    for (let l = 2; l >= 0; l--) {
        s += newstr[l] + '-';
    }

    s = s.slice(0, s.length - 1)

    myCalendar.set(s);

    lista_reservas(date);

});

$('#calendar-modal').on('show.bs.modal', function () {
    $('#my-calendar').children()[1].remove()
    lista_reservas(fecha);
})
$('#calendar-modal').on('shown.bs.modal', function () {
    $('#my-calendar').children()[1].remove()
})

$(document).on('click', '.btn-asunto', (e) => {
    var attr = $(e.currentTarget).attr('ensayo_id');

    var container = $('.form-razon');
    $(container).hide();

    container = $('#form-razon' + attr);
    $(container).show();
})

$(document).on('click', '#btn-cancelar-reserva', (e) => {
    if (!confirm('¿Estas seguro?')) {
        e.preventDefault();
    }
})

$(document).on('click', "#tag-banda", function () {
    var banda_id = $(this).attr("banda_id");
    $.ajax({
        type: "get",
        url: "bandas/" + banda_id,
        dataType: "html",
        success: function (response) {
            $('#modal-ajax').html(response);
            $('#m-c-banda').modal();
        },
        error: function (e) {
            console.log(e);
        }
    })
})

$(document).on('submit', '.form-editar-banda', function (e) {
    var form = $(this);
    var url = form.attr('action');
    var banda_id = $(form).children('[name="banda_id"]').val();
    var tag = $(`[banda_id="${banda_id}"]`);

    $.ajax({
        type: "PUT",
        url: url,
        data: form.serialize(), // serializes the form's elements.
        success: (response) => {
            response = JSON.parse(response);
            $(tag).html(response["nombre"]);
            $('#modal-banda-nombre').html(response["nombre"]);
            $('#modal-banda-bio').html(response["bio"]);
        },
        error: (e) => {
            console.log(e);
        }
    });

    e.preventDefault(); // avoid to execute the actual submit of the form.

})

$(document).on('click', '#btn-eliminar-banda', function () {
    var b_id = $(this).attr('banda_id');
    if (confirm('¿Estas serguro de querer eliminar esta banda?,\nNo podras acceder a su información ni compartirla de nuevo')) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '/bandas/' + b_id,
            type: 'DELETE',
            success: function (result) {
                $.get('bandasusu', (r) => { 
                    r = JSON.parse(r);
                    $('#banda_id').html(''); r.forEach((e) => { 
                        $('#banda_id').append('<option value="' + e.id + '">' + e.nombre + '</option>') 
                    }) 
                    $('#banda_id').append('<option value="1">otra ..</option>');
                });
                $('[banda_id=' + b_id + ']').remove();
                Snackbar.show({ text: result, pos: 'bottom-left' });
            },
            error: function (error) {
                Snackbar.show({ text: 'Ocurrió un error', pos: 'bottom-left' });
                console.log(error);
            }
        });
    }
})