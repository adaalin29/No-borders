@extends('parts.template') @section('content')
<div class="container link-container">
    <a href="terms" class="pages-link-long">
        <div class="actual-page">{{ __('site.terms') }}</div>
    </a>

    <div class = "center-title">{{ __('site.terms') }}</div>
   <div class = "terms-text">{!!$termsText->content!!}</div>
</div>
@endsection