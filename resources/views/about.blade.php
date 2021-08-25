@extends('parts.template') @section('content')
<div class="container link-container">
    <a href="about" class="pages-link">
        <div class="actual-page">{{ __('site.despre') }}</div>
    </a>
</div>
<div class="about-container">
    <div class="about-element about-element-text-modificat">
        <div class="about-element-text about-element-text-responsive about-element-text-reverse-modificat">
            <div class="index-about-title">
                <p>{!!$AboutSectionTitle1->content!!}</p>
            </div>
            <div class = "video-aici"></div>
            @if(strlen(($AboutSectionText1->content))>=460)
            <div id = "index-about-text1" class="index-about-text index-about-text-modificat">{!!$AboutSectionText1->content!!}</div>
            <div id = "read-more1" class="about-link">{{ __('site.afla') }}</div>
            @else
            <div id = "index-about-text1" class="index-about-text index-about-text-modificat">{!!$AboutSectionText2->content!!}</div>
            @endif
        </div>
        <div class="about-video">
            <a style="height:100%; width:100%;display:block;" data-fancybox=""
                href="{!!strip_tags($AboutSectionUrl->content)!!}">
                <div class="overlay"></div>
                <div class="testimonials-btn-position"><img class="testimonial-play-btn" src="images/play-button.png">
                </div>
                <img class="full-width testimonials-image img-listare-thumb0 thumb"
                    url_video="https://youtube.com/embed/-KfkCXktOs8?rel=0" src="notinh">
            </a>
        </div>
    </div>

    <div class="about-element about-element-text-modificat">
        <div class="about-image">
            <img class="full-width" style="object-fit:cover;"
                src="{{ route('thumb', ['width:500',$AboutSectionPicture2->images])}}">
        </div>
        <div class="about-element-text about-element-text-reverse about-element-text-reverse-modificat">
            <div class="index-about-title">
                <p>{!!$AboutSectionTitle2->content!!}</p>
            </div>
            @if(strlen(($AboutSectionText2->content))>=460)
            <div id = "index-about-text2" class="index-about-text index-about-text-modificat">{!!$AboutSectionText2->content!!}</div>
            <div id = "read-more2" class="about-link">{{ __('site.afla') }}</div>
            @else
            <div id = "index-about-text2" class="index-about-text index-about-text-modificat">{!!$AboutSectionText2->content!!}</div>
            @endif
        </div>
    </div>

    <div class="about-element about-element-modificat about-element-text-modificat">

        <div class="about-element-text about-element-text-responsive about-element-text-reverse-modificat">
            <div class="index-about-title">
                <p>{!!$AboutSectionTitle3->content!!}</p>
            </div>

            @if(strlen(($AboutSectionText3->content))>=460)
            <div id = "index-about-text3" class="index-about-text index-about-text-modificat">{!!$AboutSectionText3->content!!}</div>
            <div id = "read-more3" class="about-link">{{ __('site.afla') }}</div>
            @else
            <div id = "index-about-text3" class="index-about-text index-about-text-modificat">{!!$AboutSectionText3->content!!}</div>
            @endif
        </div>
        <div class="about-swiper">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach($images as $item)
                    <div class="swiper-slide">
                        <a class="fancybox-width" data-fancybox="gallery"
                            href="{{ route('thumb', ['width:500',($item->image)]) }}">
                            <div class="about-swiper-image">
                                <img class="full-width" style="object-fit:cover;"
                                    src="{{ route('thumb', ['width:500',($item->image)]) }}">
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="index-about-title partners-center" style = "display:block;">{{ __('site.parteneri') }}</div>
    <div class="partners-container">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach($partners as $item)
                <div class="swiper-slide">
                    <div class="partner-image">
                        <img class="full-width partner-img" src="{{ route('thumb', ['width:300',$item->image])}}">
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
                $('#index-about-text1').css("max-height","3000px");
                $('#index-about-text1').addClass('afisat')
            }
        }); 
    $('#read-more2').click(function () {
            if($('#index-about-text2').hasClass('afisat')){
            $('#index-about-text2').css("max-height","300px");
            $('#index-about-text2').removeClass('afisat');
            }else{
                $('#index-about-text2').css("max-height","3000px");
                $('#index-about-text2').addClass('afisat')
            }
        }); 
    $('#read-more3').click(function () {
            if($('#index-about-text3').hasClass('afisat')){
            $('#index-about-text3').css("max-height","300px");
            $('#index-about-text3').removeClass('afisat');
            }else{
                $('#index-about-text3').css("max-height","3000px");
                $('#index-about-text3').addClass('afisat')
            }
        }); 
</script>
<script>
    $(document).ready(function () {

        var swiper = new Swiper('.about-swiper .swiper-container', {
            slidesPerView: 3,
            spaceBetween: 10,
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },

        });

        var slides = 7;
            if(screen.width<=1024) {
                slides=5;
            }
            if(screen.width<=768) {
                slides=3;
            }

            var swiper = new Swiper('.partners-container .swiper-container', {
            slidesPerView: slides,
            spaceBetween: 30,
            loop: true,
            autoplay: {delay: 1, },
            freeMode: true,
            speed: 2000,
            });

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

        var thumb = Youtube.thumb('{{$AboutSectionUrl->content}}');
        $('.thumb').attr('src', thumb);

        $( document ).ready(function() {
            if(screen.width<=1024)
            $(".about-video").appendTo(".video-aici");
        });

    })
</script>
@endpush