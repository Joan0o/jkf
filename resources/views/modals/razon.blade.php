<head>
        <link rel="shortcut icon" type="img/ico" href="img/drumstick.png" />


<link href="css/plugins/bootstrap.min.css" rel="stylesheet">
        <script src="js/vendor/jquery.js"></script>
        <script src="js/vendor/popper.min.js"></script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <!-- jsCalendar style -->
        <link rel="stylesheet" type="text/css" href="js/jsCalendar/jsCalendar.css">
        <!-- jsCalendar script -->
        <script type="text/javascript" src="js/jsCalendar/jsCalendar.js"></script>
        <script type="text/javascript" src="js/jsCalendar/jsCalendar.lang.es.js"></script>

    </head>

<form id="form-razon" action="ensayos/{{$id}}" method="delete" class="jumbotron">
    @csrf
    <input type="hidden" id="ensayo_id" value="">
    <p>No hay lio, cuentanos porqué no puedes asistir ...</p>
    <div class="form-group">
        <input type="text" class="form-control" placeholder="No puedo ..." id="razon" name="detalles">
    </div>
    <input class="btn btn-danger" type="submit" value="Eliminar reserva">
</form>