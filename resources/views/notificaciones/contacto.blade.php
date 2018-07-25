@component('mail::message')
# Hola! Se ha enviado esta información a través del formulario de contacto:

Nombre: {{ $requestName }} <br>
Teléfono: {{ $requestPhone }} <br>
Email: {{ $requestEmail }} <br>
Plan: {{ $requestBudget }} <br>
Comentario: {{ $requestComment }} <br>

¡Saludos!<br><br>
{{ config('app.name') }}
@endcomponent
