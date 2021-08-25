@extends('parts.template') @section('content')
<div class="container">
  <a href="services" class="pages-link">
      <div class="actual-page">{{ __('site.servicii') }}</div>
  </a>
  <div class="services-title">{!!$servicesTitle->content!!}</div>
  <div class="servies-subtitle services-subtitle-modificat">{!!$servicesSubtitle->content!!}</div>
  <a style="width:100%;display:block;" data-fancybox="" href="{!!strip_tags($video->content)!!}">
      <div class="services-video">
          <div class="overlay"></div>
          <div class="testimonials-btn-position"><img class="testimonial-play-btn" src="images/play-button.png"></div>
          <img class="full-width testimonials-image img-listare-thumb0 thumb" src="notinh">
      </div>
  </a>
  <div class="move-it"></div>
  <div class="services-container">
    @if($services != null)
      @foreach($services as $key => $service)
        <div class="services-element @if($key%2 == 0) service-element-reversed @endif"  @if($key%2 == 0) data-aos="fade-left" @else data-aos="fade-right" @endif>
            <div class="services-element-poza services-element-poza-mobile-modificat">
                <img class="full-width" style="object-fit:contain;" src="images/services{{$key+1}}.png">
            </div>
          <div class="index-about-text-container @if($key%2 == 0) index-about-text-container-reversed @endif">
            <div class="index-about-title @if($key%2 == 0) title-service-reversed @endif">{!! $service['title']['content'] !!}</div>
            <div class="container-text-service @if($key%2 == 0) container-text-service-reversed @endif">
              <div class="text-preview-service @if($key%2 == 0) text-preview-service-reversed @endif">{!! str_limit(strip_tags($service['text']['content']), $limit = 200, $end = '...') !!}</div>
              <div class="all-text-service @if($key%2 == 0) all-text-service-reversed @endif">{!! $service['text']['content'] !!}</div>
              <div class="about-link">{{ __('site.afla') }}</div>
            </div>
          </div>
        </div>
      @endforeach
    @else
      <div class="footer-copy">Momentan nu exsta niciun serviciu disponibil.</div>
    @endif
  </div>
</div>
@endsection
@push('scripts')
<script>
  $(document).ready(function () {
      if (screen.width <= 1024){
        $(".servies-subtitle").appendTo(".move-it");
      }
      var Youtube = (function () {
          'use strict';

          var video, results;

          var getThumb = function (url, size) {
              if (url === null) {
                  return '';
              }
              size = (size === null) ? 'big' : size;
              results = url.match('[\\?&]v=([^&#]*)');
              video = (results === null) ? url : results[1];

              if (size === 'small') {
                  return 'http://img.youtube.com/vi/' +
                      video + '/2.jpg';
              }
              return 'http://img.youtube.com/vi/' + video +
                  '/0.jpg';
          };

          return {
              thumb: getThumb
          };
      }());

    var thumb = Youtube.thumb('{{$video->content}}');
    $('.thumb').attr('src', thumb);

    $('.about-link').click(function () {
      $(this).parent().find($(".text-preview-service")).hide();
      $(this).parent().find($(".all-text-service")).show();
      $(this).hide();
    }); 
  });
  AOS.init();
</script>
@endpush