@component('mail::message')

¡ Tu en reserva ha sido registrada !

Te esperamos a las {{ $horaLlegada }},
recuerda que ensayas {{ $duracion }} hora(s), 
por lo que terminas a las {{ $horaSalida }}

Gracias,<br>
{{ config('app.name') }}
@endcomponent
