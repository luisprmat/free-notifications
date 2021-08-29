@component('mail::message')
# Hola Coders

Para leer tu mensaje haz clic en el botón.

@component('mail::button', ['url' => route('messages.show', $message)])
Ver Mensaje
@endcomponent

Hasta luego,<br>
*Free Notifications*
@endcomponent
