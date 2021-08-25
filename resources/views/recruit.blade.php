@extends('parts.template') @section('content')
<div class="container link-container">
    <a href="recruit" class="pages-link-long">
        <div class="actual-page">{{ __('site.recruit') }}</div>
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
            <div class="index-about-text index-about-text-modificat modific-text">{!!$content1->content!!}</div>
            @endif
        </div>
        <div class="about-image imagine-mobile-ascunsa">
            <img class="full-width" style="object-fit:cover;" src="{{ route('thumb', ['width:1000',$image1->images])}}">
        </div>
    </div>
    <div class="about-element about-element-text-modificat" data-aos="fade-left">
        <div class="about-image imagine-mobile-modificata">
            <img class="full-width" style="object-fit:cover;" src="{{ route('thumb', ['width:1000',$image3->images])}}">
        </div>
        <div class="about-element-text about-element-text-reverse about-element-text-reverse-modificat">
            <div class="index-about-title">
                <p>{!!$title3->content!!}</p>
            </div>
            @if(strlen($content3->content)>=460)
            <div id = "index-about-text3" class="index-about-text index-about-text-modificat">{!!$content3->content!!}</div>
            <div id = "read-more3" class="about-link">{{ __('site.afla') }}</div>
            @else
            <div class="index-about-text index-about-text-modificat">{!!$content3->content!!}</div>
            @endif
        </div>
    </div>
<!--     <div class="about-element about-element-text-modificat" data-aos="fade-right">
        <div class="about-element-text about-element-text-responsive about-element-text-reverse-modificat">
            <div class="index-about-title">
                <p>{!!$title3->content!!}</p>
            </div>
            <div class="about-image imagine-mobile">
                <img class="full-width" style="object-fit:cover;"
                    src="{{ route('thumb', ['width:1000',$image3->images])}}">
            </div>
            @if(strlen($content3->content)>=460)
            <div id = "index-about-text3" class="index-about-text index-about-text-modificat">{!!$content3->content!!}</div>
            <div id = "read-more3" class="about-link">{{ __('site.afla') }}</div>
            @else
            <div class="index-about-text index-about-text-modificat">{!!$content3->content!!}</div>
            @endif
        </div>
        <div class="about-image imagine-mobile-ascunsa">
            <img class="full-width" style="object-fit:cover;" src="{{ route('thumb', ['width:1000',$image3->images])}}">
        </div>
    </div> -->

    <div class="container">
        <div class="package-container">
            

            <div class="package-left" data-aos="fade-right" data-aos-delay="0">
                <div class="package-title">{{ __('site.package-title2') }}</div>
                <div class="package-elemente">
                    @foreach($silver as $item)
                    <div class="package-element">
                        <div class="package-image"><img class="full-width" src="images/check.svg"></div>
                    <div class="package-text">{{$item->text}}</div>
                    </div>
                    @endforeach
                    <a href="contact" style="display:block;" class ="cere-class">
                        <div class="request-package">{{ __('site.cere-pachet') }}</div>
                    </a>
                </div>
            </div>

            <div class="package-left" data-aos="fade-right" data-aos-delay="0">
                <div class="package-title">{{ __('site.package-title1') }}</div>
                <div class="package-elemente">
                    @foreach($gold as $item)
                    <div class="package-element">
                        <div class="package-image"><img class="full-width" src="images/check.svg"></div>
                    <div class="package-text">{{$item->text}}</div>
                    </div>
                    @endforeach
                    <a href="contact" style="display:block;" class ="cere-class">
                        <div class="request-package">{{ __('site.cere-pachet') }}</div>
                    </a>
                </div>
            </div>
            
        </div>
        <div class="package-center" data-aos="fade-right" data-aos-delay="0">
            <div class="package-title">{{ __('site.package-title3') }}</div>
            <div class="package-elemente">
                @foreach($bronse as $item)
                <div class="package-element">
                    <div class="package-image"><img class="full-width" src="images/check.svg"></div>
                <div class="package-text">{{$item->text}}</div>
                </div>
                @endforeach
                <a href="contact" style="display:block;" class ="cere-class">
                    <div class="request-package">{{ __('site.cere-pachet') }}</div>
                </a>
            </div>
        </div>
    </div>
    @endsection
    @push('scripts')
    <script>
        $(document).ready(function () {
            AOS.init();
        });
    </script>
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
            $('#read-more3').click(function () {
                if($('#index-about-text3').hasClass('afisat')){
                $('#index-about-text3').css("max-height","300px");
                $('#index-about-text3').removeClass('afisat');
                }else{
                    $('#index-about-text3').css("max-height","1000px");
                    $('#index-about-text3').addClass('afisat')
                }
            }); 
    </script>
    @endpush