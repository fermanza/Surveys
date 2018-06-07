@component('mail::message')
# Aprobar Encuesta Pública en Survenia

La encuesta creada:
@component('mail::button', ['url' => $urlVer ,'color' => 'blue'])
Ver Encuesta
@endcomponent

Da click en el siguiente botón para aprovar la encuesta:
@component('mail::button', ['url' => $urlAprobar ,'color' => 'green'])
Aprobar
@endcomponent

O da click acá para rechazarla:
@component('mail::button', ['url' => $urlRechazar ,'color' => 'red'])
Rechazar
@endcomponent


Gracias,<br>
{{ config('app.name') }}
@endcomponent