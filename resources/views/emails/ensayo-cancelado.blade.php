@component('mail::message')

El ensayo a las {{ $hora }} ha sido cancelado

- Banda: {{ $banda }}
- Duracion: {{ $duracion }} hora(s).
- Motivo: {{ $motivo }}
- Contacto de la banda: {{ $contacto_banda }}

Gracias,<br>
{{ config('app.name') }}
- Contacto de la sala: {{ $contacto_sala }}

@endcomponent
