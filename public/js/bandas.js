var links = [];
var inputs = [];

$(document).on('click', '.btn-añadir-link', function () {
    var element = $(this).attr('data-id');
    $(".link--" + element).append(
        "<div class=\"input-group\">\n\
            <input name=\"link\" type=\"text\" class=\"form-control\" placeholder=\"Link ... (youtube, soundcloud)\"> \n\
            <div class=\"input-group-append\">\n\
            <button class=\"btn btn-outline-secondary remove\" type=\"button\">x</button>\n\
            </div>\n\
            </div>"
    );
});

$(document).on('click', '.remove', function () {
    $(this).parent().parent().remove();
});

function fillLists(tis) {

    var listas = $(tis).parent().parent().children(".añadir");

    $(listas).children("div").children("div").children("input[name='link']").each(function (id, item) {
        var item = $(item).val();
        if (item !== "") {
            links.push(item);
            inputs.push($(this));
        }
    });

    var yes = true;
    if (links.length == 0) {
        yes = window.confirm("La lista de links está vacia, ¿deseas continuar?");
    }

    if (inputs.length > 0 && yes) {
        inputs.forEach(
            function (item) {
                $(item).val('');
            });
        inputs = [];
    }

    return yes;
}

$(document).on('click', '.btn-nueva-cancion', function (e) {

    var div_nuevaCancion = $(this).parent().parent();

    var nombre = $(div_nuevaCancion).children("input[name='nombre']");

    var banda = $(div_nuevaCancion).children("#banda_id").val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    if ($(nombre).val() != '') {
        if (fillLists($(this))) {
            $.post({
                url: "canciones",
                data: {

                    "nombre": $(nombre).val(),
                    "banda_id": banda,
                    "links": JSON.stringify(links),
                },
                dataType: "html",
                success: function (response) {
                    $(div_nuevaCancion).hide('slow');
                    $("#lista-de-canciones").html(response);;
                },
                error: function (err) {
                    console.log(err)
                }
            });
        }
    } else {
        e.preventDefault();
        $(nombre).toggleClass("error_campo", true);
    }

});

$(document).on('click', '#btn-show', function () {
    var container = $(this).parent().children('#nueva-cancion');
    if ($(container).is(":hidden")) {
        $(container).show("slow");
    } else {
        $(container).hide("slow");
    }
});

function campo_vacio(campo) {
    $(campo).attr().add("error_campo");
    $(campo).focus();
}

var element = document.getElementById("my-calendar");

// Create the calendar
var myCalendar = jsCalendar.new(element);

$('#m-e').on('click', function () {
    $('#my-calendar').children()[1].remove()
})

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

    $.get("/ensayos/" + date.DateToString(), function (data) {
        if (data) {
            $('#horas-ensayo').html('');
            data.forEach((e, i) => {
                hora = e['hora'];
                duracion = parseInt(hora) + parseInt(e['duracion']);

                if (hora > 12) {
                    hora = (hora - 12) + ' pm'; duracion = (duracion - 12) + ' pm'
                }

                if (e['from_user'] == 'true') {
                    $("#horas-ensayo").append(
                        '<a class="list-group-item list-group-item-action">' +
                        'De ' + hora +
                        ' a ' + duracion +
                        '<span class="badge badge-warning" style="margin-left:10px;">' + e['nombre'] + '</span>'
                        + '</a>'
                    );
                }

            })
        }
    });
});

$(".tag-banda").on('click', function () {
    var banda_id = $(this).attr("banda_id");
    $.ajax({
        type: "get",
        url: "bandas/" + banda_id,
        dataType: "html",
        success: function (response) {
            $('#modal-banda').html(response);
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
