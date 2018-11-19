@extends('admin.template')

@section('sidebar')
    @parent
@stop

@section('content')
<div class="card" style="width:100%">
        <div class="card-header" style="padding:20px;">
            <h3>Nuevo</h3>
        </div>
            <div class="card-body">
                <div class="wrapper">
                    <div class="card calendario">
                        <div class="card-header">
                                <h5>Calendario</h5>
                        </div>
                        <div class="card-body">
                            <!-- Material theme -->
                            <div style="min-width:300px !important;" id="my-calendar2" class="auto-jsCalendar material-theme orange"
                                                        data-language="es"></div>
                        </div>
                    </div>
                    <div class="card lista">
                        <div class="card-header">
                            <h5>Ensayos</h5>
                        </div>
                        <div class="card-body" style="padding-right:30px;">
                            <div class="list-group">
                                <div id="horas-ensayo">
                                    <a href="#" class="list-group-item list-group-item-action">No hay reservas todavia...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

                $("#horas-ensayo").append(
                    '<a class="list-group-item list-group-item-action">' +
                    'De ' + hora +
                    ' a ' + duracion +
                    '<span class="badge badge-warning" style="margin-left:10px;">' + e['nombre'] + '</span>' +
                    '<span class="badge badge-warning" style="margin-left:10px;">' + e['contacto'] + '</span>'
                    + '</a>'
                );

            })
        }
    });
});

</script>
@stop
