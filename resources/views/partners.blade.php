@extends('parts.template') @section('content')
<div class="container link-container">
    <a href="partners" class="pages-link-long">
        <div class="actual-page">{{ __('site.parteneri') }}</div>
    </a>
</div>
<div class="about-container">
    <div class="about-element about-element-text-modificat" data-aos="fade-right">
        <div class="about-element-text about-element-text-responsive about-element-text-reverse-modificat">
            <div class="index-about-title">
                <p>{!!$title1->content!!}</p>
            </div>
            <div class="about-image imagine-mobile">
                <img class="full-width" style="object-fit:cover;"
                    src="{{ route('thumb', ['width:1000',$image1->images])}}">
            </div>

            @if(strlen($content1->content)>=460)
            <div id = "index-about-text1" class="index-about-text index-about-text-modificat">{!!$content1->content!!}</div>
            <div id = "read-more1" class="about-link">{{ __('site.afla') }}</div>
            @else
            <div id = "index-about-text1" class="index-about-text index-about-text-modificat">{!!$content1->content!!}</div>
            @endif
        </div>


        <div class="about-image imagine-mobile-ascunsa">
            <img class="full-width" style="object-fit:cover;" src="{{ route('thumb', ['width:1000',$image1->images])}}">
        </div>
    </div>

    <div class="about-element about-element-text-modificat" data-aos="fade-left">
        <div class="about-image imagine-mobile-modificata">
            <img class="full-width" style="object-fit:cover;" src="{{ route('thumb', ['width:1000',$image2->images])}}">
        </div>
        <div class="about-element-text about-element-text-reverse about-element-text-reverse-modificat ">

            @if(strlen($content2->content)>=460)
            <div id = "index-about-text2" class="index-about-text index-about-text-modificat">{!!$content2->content!!}</div>
            <div id = "read-more2" class="about-link">{{ __('site.afla') }}</div>
            @else
            <div id = "index-about-text2" class="index-about-text index-about-text-modificat">{!!$content2->content!!}</div>
            @endif


            <a href="contact" style = "display:block; width:210px;">
                <div class="contact-button contact-button-modified">{{ __('site.connect') }}</div>
            </a>
        </div>
    </div>
    <div class = "container">
        <div class="index-about-title partners-center">
            <p>{!!$title1->content!!}</p>
        </div>
        <div class = "partners-container">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach($partners as $item)
                  <div class="swiper-slide">
                      <div class = "partner-image">
                          <img class = "full-width partner-img" src = "{{ route('thumb', ['width:300',$item->image])}}">
                      </div>
                  </div>
                  @endforeach
                </div>
              </div>
        </div>
    </div>
    @endsection
    @push('scripts')
    <script>
        $('#read-more1').click(function () {
                if($('#index-about-text1').hasClass('afisat')){
                $('#index-about-text1').css("max-height","300px");
                $('#index-about-text1').removeClass('afisat');
                }else{
                    $('#index-about-text1').css("max-height","1000px");
                    $('#index-about-text1').addClass('afisat')
                }
            }); 
    
            $('#read-more2').click(function () {
                if($('#index-about-text2').hasClass('afisat')){
                $('#index-about-text2').css("max-height","300px");
                $('#index-about-text2').removeClass('afisat');
                }else{
                    $('#index-about-text2').css("max-height","1000px");
                    $('#index-about-text2').addClass('afisat')
                }
            }); 
    </script>
    <script>
        $( document ).ready(function() {
            AOS.init();

            var slides = 7;
            if(screen.width<=1024) {
                slides=5;
            }
            if(screen.width<=768) {
                slides=3;
            }

            var swiper = new Swiper('.swiper-container', {
            slidesPerView: slides,
            spaceBetween: 30,
            loop: true,
            autoplay: {delay: 1, },
            freeMode: true,
            speed: 2000,
            });
        });
    </script>
    @endpush