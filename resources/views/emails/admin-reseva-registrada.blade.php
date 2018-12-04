@component('mail::message')

El usuario {{ $nombre }} ha reservado a las {{ $hora }} 

- Duración: {{ $duracion }} hora(s)
- Contacto: {{ $contacto }}

Gracias,<br>
{{ config('app.name') }}
@endcomponent
