Echo.channel('reservas')
    .listen('reserva', (e) => {
        alert(e.hora)
    });