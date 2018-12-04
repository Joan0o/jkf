<link rel="stylesheet" href="css/plugins/snackbar.min.css">
<script src="js/vendor/snackbar.min.js"></script> 

<div class="container">
    <br>
    <h2>
        Historia de reservas
    </h2>
    <br><br>
    <div class="row">
        <div class="calendario col-md-4">
                    <h5>Calendario</h5>
                <!-- Material theme -->
                <div style="min-width:300px !important;" id="my-calendar2" class="auto-jsCalendar material-theme orange"
                                            data-language="es"></div>
        </div>
        <div class="col-md lista">
                <h5>Ensayos</h5>
            <div style="padding-right:30px;">
                <div class="list-group">
                    <div id="horas-ensayo">
                        <a href="#" class="list-group-item list-group-item-action">No hay reservas todavia...</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@component('layouts.modal')
    @slot('modal') editar @endslot
    @slot('title') Despachar @endslot
    @slot('content')
        <form id="confirmar" class="form-group">
            <p id="info"></p><br>
            <input class="form-control"  name="detalles" type="text" placeholder="Detalles..."><br>
            <input class="form-control" name="pagado" type="number" placeholder="Total pagado..."><br>
            <input class="btn btn-info" type="submit" value="Confirmar">
        </form>
    @endslot

@endcomponent

<script>
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
var element = document.getElementById("my-calendar2");

// Create the calendar
var myCalendar = jsCalendar.new(element);

setTimeout(function(){
    $('#my-calendar2').children()[1].remove();
}, 100);
setTimeout(function(){
    if($('#my-calendar2').children()[1]){
        $('#my-calendar2').children()[1].remove();
    }
}, 200);

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
            ensayos = data;
            data.forEach((e, i) => {
                hora = e['hora'];
                duracion = parseInt(hora) + parseInt(e['duracion']);

                if (hora > 12) {
                    hora = (hora - 12) + ' pm'; duracion = (duracion - 12) + ' pm'
                }

                var content = $('meta[name="csrf-token"]').attr('content');
                var ensayo_id = e['id'];
                console.log(e['estado'])
                var str = '<div class="list-group-item list-group-item-action">' +
                            'De ' + hora + ' a ' + duracion 
                            + ((e['nombre'] != "null") ? '<span class="badge badge-ligth" style="margin-left:10px;">' + e['nombre'] + '</span>' :'<span class="badge badge-ligth" style="margin-left:10px;">Sin banda</span>')
                            + '<span class="badge badge-info" style="margin-left:10px;">' + e['contacto'] + '</span>';
                
                try {
                    if (e['estado'] == 'cancelado') {
                    str += '<span class="badge badge-danger" style="margin-left:10px;">Ensayo cancelado</span>';
                } else {
                    if (e['estado'] == 'confirmado') {
                        if ((e['duracion'] * 2000) == e['pagado']) {
                            str += '<span class="badge badge-success" style="margin-left:10px;">Ensayo confirmado</span>';
                        } else {
                            str += '<span class="badge badge-info" style="margin-left:10px;">La banda debe ' + ((e['duracion'] * 2000) - e['pagado']) + '</span>';
                        }
                    } else {
                        str += 
                            '<input class="btn btn-danger btn-asunto" style="margin-left:30px" type="button" ensayo_id=' + ensayo_id + ' value="Cancelar ensayo">' +
                            '<input class="btn btn-success btn-confirmar" style="margin-left:30px" type="button" ensayo_id=' + ensayo_id + ' value="Confirmar">' +
                            '<form style="display:none" id="form-razon' + ensayo_id + '" action="ensayos/' + ensayo_id + '" method="post" class="form-group form-razon">' +
                            '<meta name="csrf-token" content="' + content + '">' +
                            '<input type="hidden" id="ensayo_id" value="">' +
                            '<p>Se enviará este mensaje al usuario ...</p>' +
                            '<div class="form-group">' +
                            '<input type="text" class="form-control" placeholder="No puedo ..." id="razon" name="detalles">' +
                            '</div>' +
                            '<input class="btn btn-danger" type="submit" value="Eliminar reserva">' +
                            '<a style="display:inline; margin-left:30px" class="btn btn-outline-secondary btn-asunto">cancelar</a>' +
                            '</form>';
                    }
                }
                } catch (error) {
                    
                }
                
                
                str += '</div>';
                console.log(str)

                $("#horas-ensayo").append(str);

            })
        }
    });
});

$(document).on('click', '.btn-asunto', (e) => {
    var attr = $(e.currentTarget).attr('ensayo_id');

    var container = $('.form-razon');
        $(container).hide();

    container = $('#form-razon'+attr);
        $(container).show();
})

var ensayos;
var ensayo;

$(document).on('click', '.btn-confirmar', (e) => {
    var attr = $(e.currentTarget).attr('ensayo_id');
    
    ensayo = ensayos.find(function(l) {
        return l.id == attr;
    });

    $('#info').html('Esta banda ensayó dos horas, debe <strong>'+(ensayo.duracion*2000)+' pesos </strong>');
    $('#editar').modal();
})

$(document).on('submit', '#confirmar', function (e) {
    var form = $(this);

    $.ajax({
        type: "PUT",
        url: "ensayos/" + ensayo.id,
        data: form.serialize(), // serializes the form's elements.
        success: (response) => {
            location.reload();
        },
        error: (e) => {
            console.log(e);
        }
    });

    e.preventDefault(); // avoid to execute the actual submit of the form.

})

</script>
<style>
    .btn{
        margin:10px 0;
    }
</style>