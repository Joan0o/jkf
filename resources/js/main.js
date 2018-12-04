Echo.channel('reservas')
    .listen('reserva', (e) => {
        hora = (e.reserva.hora > 12) ? (parseInt(e.reserva.hora) - 12) + " pm" : e.reserva.hora + " am";
        Snackbar.show({text: `nuevo ensayo registrado a las ${hora}`, pos: 'bottom-left'});
        alert(location.href);
        alert(location.href.includes('admin'));
        if(location.href.includes("/admin")){
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