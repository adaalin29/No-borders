@extends('parts.template') @section('content')
<div class="container link-container">
    <a href="politica" class="pages-link-long">
        <div class="actual-page">{{ __('site.confidentialitate') }}</div>
    </a>

    <div class = "center-title">{{ __('site.confidentialitate') }}</div>
   <div class = "terms-text">{!!$termsText->content!!}</div>
</div>
@endsection