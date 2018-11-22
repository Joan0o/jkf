Echo.channel('reservas')
    .listen('reserva', (e) => {
        if(location.href.includes("/admin")){
            hora = (e.reserva.hora > 12) ? (parseInt(e.reserva.hora) - 12) + " pm" : e.reserva.hora + " am";
            alert(`nuevo ensayo registrado a las ${hora}`);
                $("#horas-ensayo").append(
                    '<a class="list-group-item list-group-item-action">' +
                    'De ' + hora +
                    ' a ' + (parseInt(hora.substr(-3)) + parseInt(e.reserva.duracion)) +
                    '<span class="badge badge-warning" style="margin-left:10px;">' + e['nombre'] + '</span>' +
                    '<span class="badge badge-warning" style="margin-left:10px;">' + e['contacto'] + '</span>'
                    + '</a>'
                );
        }else{
            var horas = $('#horas option');
            for (let i = 0; i < horas.length; i++) {
                if(horas[i].value == e.reserva.hora){
                    horas[i].remove();
                }
            }
        }
    });