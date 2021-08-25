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
        <div class="services-element" data-aos="fade-right">
            <div class="services-element-poza services-element-poza-mobile-modificat">
                <img class="full-width" style="object-fit:contain;" src="images/services1.png">
            </div>
            <div class="index-about-text-container">
                <div class="index-about-title">
                    <p>{!!$ServiceTitle1->content!!}</p>
                </div>
                @if(strlen(($ServiceText1->content))<=425) 
                <div class="index-about-text" id = "index-about-text1">{!!($ServiceText1->content)!!}</div>
                 @else
                    <div class="index-about-text" id = "index-about-text1">{!!($ServiceText1->content)!!}</div>
                    <div id = "read-more1" class="about-link">{{ __('site.afla') }}</div>
                @endif
        </div>
    </div>

    <div class="services-element services-element-reversed" data-aos="fade-left">
        <div class="index-about-text-container-reverse services-element-modificat">
            <div class="index-about-title text-reverse">
                <p>{!!$ServiceTitle2->content!!}</p>
            </div>
            @if(strlen(($ServiceText2->content))<=445)
               <div id = "index-about-text2" class="index-about-text-reverse text-reverse">{!!$ServiceText2->content!!}</div>
            @else
            <div id = "index-about-text2" class="index-about-text-reverse text-reverse">{!!$ServiceText2->content!!}</div>
                <div id = "read-more2" class="about-link index-about-link-reversed">{{ __('site.afla') }}</div>
            @endif 
        </div>
        <div class="services-element-poza services-element-poza-mobile-modificat">
            <img class="full-width" style="object-fit:contain;" src="images/services2.png">
        </div>
    </div>

    <div class="services-element" data-aos="fade-right">
        <div class="services-element-poza services-element-poza-mobile-modificat">
            <img class="full-width" style="object-fit:contain;" src="images/services3.png">
        </div>
        <div class="index-about-text-container">
            <div class="index-about-title">
                <p>{!!$ServiceTitle3->content!!}</p>
            </div>
            @if(strlen(($ServiceText3->content))<=445) 
                <div class="index-about-text" id = "index-about-text3">{!!($ServiceText3->content)!!}</div>
                 @else
                    <div class="index-about-text" id = "index-about-text3">{!!($ServiceText3->content)!!}</div>
                    <div id = "read-more3" class="about-link">{{ __('site.afla') }}</div>
                @endif
        </div>
    </div>

    <div class="services-element services-element-reversed" data-aos="fade-left">
        <div class="index-about-text-container-reverse services-element-modificat">
            <div class="index-about-title text-reverse">
                <p>{!!$ServiceTitle4->content!!}</p>
            </div>
            @if(strlen(($ServiceText4->content))<=445)
               <div id = "index-about-text4" class="index-about-text-reverse text-reverse">{!!$ServiceText4->content!!}</div>
            @else
            <div id = "index-about-text4" class="index-about-text-reverse text-reverse">{!!$ServiceText4->content!!}</div>
                <div id = "read-more4" class="about-link index-about-link-reversed">{{ __('site.afla') }}</div>
            @endif 
        </div>
        <div class="services-element-poza services-element-poza-mobile-modificat">
            <img class="full-width" style="object-fit:contain;" src="images/services4.png">
        </div>
    </div>

    <div class="services-element" data-aos="fade-right">
        <div class="services-element-poza services-element-poza-mobile-modificat">
            <img class="full-width" style="object-fit:contain;" src="images/services5.png">
        </div>
        <div class="index-about-text-container">
            <div class="index-about-title">
                <p>{!!$ServiceTitle5->content!!}</p>
            </div>
            @if(strlen(($ServiceText5->content))<=445) 
            <div class="index-about-text" id = "index-about-text5">{!!($ServiceText5->content)!!}</div>
             @else
                <div class="index-about-text" id = "index-about-text5">{!!($ServiceText5->content)!!}</div>
                <div id = "read-more5" class="about-link">{{ __('site.afla') }}</div>
            @endif
        </div>
    </div>

    <div class="services-element services-element-reversed" data-aos="fade-left">
        <div class="index-about-text-container-reverse services-element-modificat">
            <div class="index-about-title text-reverse">
                <p>{!!$ServiceTitle6->content!!}</p>
            </div>
            @if(strlen(($ServiceText6->content))<=445)
               <div id = "index-about-text6" class="index-about-text-reverse text-reverse">{!!$ServiceText6->content!!}</div>
            @else
            <div id = "index-about-text6" class="index-about-text-reverse text-reverse">{!!$ServiceText6->content!!}</div>
                <div id = "read-more6" class="about-link index-about-link-reversed">{{ __('site.afla') }}</div>
            @endif 
        </div>
        <div class="services-element-poza services-element-poza-mobile-modificat">
            <img class="full-width" style="object-fit:contain;" src="images/services6.png">
        </div>
    </div>


</div>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function () {
        if (screen.width <= 1024)
            $(".servies-subtitle").appendTo(".move-it");
    });
    AOS.init();
</script>
<script>
    $(document).ready(function () {

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




    })

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
    $('#read-more3').click(function () {
            if($('#index-about-text3').hasClass('afisat')){
            $('#index-about-text3').css("max-height","300px");
            $('#index-about-text3').removeClass('afisat');
            }else{
                $('#index-about-text3').css("max-height","1000px");
                $('#index-about-text3').addClass('afisat')
            }
        }); 
    $('#read-more4').click(function () {
            if($('#index-about-text4').hasClass('afisat')){
            $('#index-about-text4').css("max-height","300px");
            $('#index-about-text4').removeClass('afisat');
            }else{
                $('#index-about-text4').css("max-height","1000px");
                $('#index-about-text4').addClass('afisat')
            }
        }); 
    $('#read-more5').click(function () {
            if($('#index-about-text5').hasClass('afisat')){
            $('#index-about-text5').css("max-height","300px");
            $('#index-about-text5').removeClass('afisat');
            }else{
                $('#index-about-text5').css("max-height","1000px");
                $('#index-about-text5').addClass('afisat')
            }
        }); 
    $('#read-more6').click(function () {
            if($('#index-about-text6').hasClass('afisat')){
            $('#index-about-text6').css("max-height","300px");
            $('#index-about-text6').removeClass('afisat');
            }else{
                $('#index-about-text6').css("max-height","1000px");
                $('#index-about-text6').addClass('afisat')
            }
        }); 
</script>
@endpush