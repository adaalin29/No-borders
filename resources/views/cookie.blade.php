@extends('parts.template') @section('content')
<div class="container link-container">
    <a href="cookies" class="pages-link-long">
        <div class="actual-page">Cookies</div>
    </a>

    <div class = "center-title">Cookies</div>
   <div class = "terms-text">{!!$termsText->content!!}</div>
</div>
@endsection