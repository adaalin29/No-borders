@component('mail::message')
# Vreau in echipa {{ config('app.name') }} 

@component('mail::panel')
<div style="width:100%; text-align:center; font-size:30px; font-height:bold;">
  Date primite:
</div>

Job selectat: {{$message['job']}}<br>
{{-- Email: {{$message['email']}}<br> --}}
@if( $message['cv'] != null )
Descarca cv-ul atasat acestui email.
@endif

@endcomponent

Va multumim,<br>
Echipa {{ config('app.name') }}
@endcomponent
