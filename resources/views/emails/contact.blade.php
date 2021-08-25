@component('mail::message')
# Mesaj nou

@component('mail::panel')
<div style="width:100%; text-align:center; font-size:30px; font-height:bold;">
Aveti un mesaj nou:
</div>

Nume: {{$message['name']}}<br>
Email: {{$message['email']}}<br>
Mesaj: {{$message['message']}}<br>


@endcomponent

Multumim,<br>
Echipa No Borders
@endcomponent
