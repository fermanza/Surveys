@component('mail::message')
# Hola! Acabas de crear una cuenta para el sitio web de Survenia.

Da click en el siguiente botón para iniciar sesión:
@component('mail::button', ['url' => $inicio ,'color' => 'green'])
Iniciar Sesión
@endcomponent

¡Gracias por registrarte en Survenia!<br><br>
{{ config('app.name') }}
@endcomponent