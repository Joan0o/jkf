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


$(document).ready(function () {

    var mañana = new Date();
    mañana.setDate(mañana.getDate() + 1)

    $('#fecha').append('<option value=' + fecha.DateToString() + '>hoy</option>');
    $('#fecha').append('<option value=' + mañana.DateToString() + '>mañana</option>');

    horas(fecha.DateToString(), fecha.DateToString(), duracion);
});

var c_D = fecha.DateToString();

$('#fecha').on('change', function () {
    c_D = $("#fecha option:selected").val();
    horas(c_D, fecha.DateToString(), duracion);
});

function horas(date, today, callback = null) {

    horario = [];

    let hora_de_hoy = (date != today) ? 7 : fecha.getHours();
    if(hora_de_hoy < 7){
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
                    duracion();
                }

                if ($("#horas option").length == 0) $("#horas").append('<option>Ya no puedes ensayar hoy, reserva mañana!</option>');

                if(callback) callback();
            }
        });
    } else {
        $("#horas").append('<option>Ya no puedes ensayar hoy, reserva mañana!</option>');

        $('#reservar').prop('disabled', true);
    }

}


$('#horas').on('change', function () {
    duracion();
})

function duracion(){
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

var modalAbierto = false;

function showModal() {
    modalAbierto = true;
    $('#contacto').prop('required', true)
    $('#contacto-nombre').prop('required', true)
    $('#modal-contacto').modal();

}
$("#form-reserva").on('submit', function (e) {
    if ($('#banda_id').val() == "1" != modalAbierto) {
        showModal();
        e.preventDefault();
        return;
    }

    form = $(this);

    $.post({
        url: "ensayos/reservar",
        data: form.serialize(), // serializes the form's elements.
        success: (e) => {
            var hora_final = parseInt($('#horas').val()) + parseInt($('[name="duracion"]:checked').val());
            alert(
                'Sala reservada desde las  ' 
                    + ($('#horas').val() <= 12) ? $('#horas').val() : $('#horas').val() - 12
                    + ' hasta las ' 
                    + (hora_final <= 12) ? hora_final : hora_final - 12 );
            $('#modal-contacto').modal('hide');
            horas(c_D, fecha.DateToString());
        },
        error: (e) => {
            console.log(e);
        }
    });

    e.preventDefault();
})

$('#modal-contacto').on('hidden.bs.modal', function () {
    $('#contacto').prop('required', false)
    $('#contacto-nombre').prop('required', false)
    modalAbierto = false;
})