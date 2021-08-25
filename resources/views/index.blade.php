@extends('parts.template') @section('content')
<div class="index-header">
    <div class="container">
        <div class="index-top-container">
            <div class="index-top-left">
                <div class="index-top-title">{!!$index_title->content!!}</div>
                {{-- <div class="index-top-subtitle">{!!$index_subtitle->content!!}</div> --}}
                <form class="index-search-form" method="get" action="{{ url('/jobs') }}">
                    <div class="search-bar">
                        <input class="index-search" type="text" name="q" placeholder=" {{ __('site.search-job') }}">
                        <button type="submit" class="index-search-button"><img class="full-width"
                                src="images/index-search.svg"></button>
                    </div>
                </form>
            </div>
            <div class="index-top-right">
                <div class="fata-image">
                    <img src="images/fata-index.svg" class="full-width">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    @if($jobs !== null)
    <div class="jobs-container-text">
        <div class="index-title">{{ __('site.joburi-recente') }}</div>
        <div class="index-subtitle">{!!$jobs_title->content!!}</div>
    </div>
    <div class="job-elemente">
        @foreach($jobs as $job)
        <div class="job-item">
            @if($job->image!=null)
            <div class="job-logo">
                <div class="job-logo-image"><img class="full-width" src="{{ route('thumb', ['width:200',$job->image])}}"></div>
            </div>
            @endif
            <div class="job-time">{{ __('site.valabil') }} {{\Carbon\Carbon::parse($job->date)->format('d-m-Y')}}</div>
            <div class="job-title">{{$job->title}}</div>
            <div class="job-location">{{$job->locatie['name']}}, {{$job->Country}}</div>
            <div class="job-description">{!!str_limit($job->Description,166,$end = '...')!!} </div>
            <a href="job-detail/{{$job->id}}" style="display:block;">
                <div class="detaliu-job">{{ __('site.vezi-detalii') }}</div>
            </a>
        </div>
        @endforeach
    </div>
    <a class="joburi-link joburi-link-modificat" href="jobs" style="display:block;">
        <div class="vezi-joburi">{{ __('site.all-jobs') }}</div>
    </a>
    @endif
</div>
<div class="index-servicii">
    <div class="servicii-title">{{ __('site.servicii') }}</div>
    <div class="servicii-desktop">
        <div class="servicii-container">
            <div class="servicii-item">
                <div class="serviciu-item-container">
                    <div class="servicii-image"><img class="full-width" src="images/serviciu1.svg"></div>
                    <div class="serviciu-title">{!!$servicii_titlu1->content!!}</div>
                    {{-- <div class="serviciu-text">{!!$servicii_text1->content!!}</div> --}}
                </div>
                <div class="serviciu-linie"></div>
            </div>

            <div class="servicii-item">
                <div class="serviciu-item-container">
                    <div class="servicii-image"><img class="full-width" src="images/serviciu2.svg"></div>
                    <div class="serviciu-title">{!!$servicii_titlu2->content!!}</div>
                    {{-- <div class="serviciu-text">{!!$servicii_text2->content!!}</div> --}}
                </div>
                <div class="serviciu-linie"></div>
            </div>

            <div class="servicii-item">
                <div class="serviciu-item-container">
                    <div class="servicii-image"><img class="full-width" src="images/serviciu3.svg"></div>
                    <div class="serviciu-title">{!!$servicii_titlu3->content!!}</div>
                    {{-- <div class="serviciu-text">{!!$servicii_text3->content!!}</div> --}}
                </div>
                <div class="serviciu-linie"></div>
            </div>


            <div class="servicii-item">
                <div class="serviciu-item-container">
                    <div class="servicii-image"><img class="full-width" src="images/serviciu4.svg"></div>
                    <div class="serviciu-title">{!!$servicii_titlu4->content!!}</div>
                    {{-- <div class="serviciu-text">{!!$servicii_text4->content!!}</div> --}}
                </div>
                <div class="serviciu-linie"></div>
            </div>


            <div class="servicii-item">
                <div class="serviciu-item-container">
                    <div class="servicii-image"><img class="full-width" src="images/serviciu5.svg"></div>
                    <div class="serviciu-title">{!!$servicii_titlu5->content!!}</div>
                    {{-- <div class="serviciu-text">{!!$servicii_text5->content!!}</div> --}}
                </div>
                <div class="serviciu-linie"></div>
            </div>


            <div class="servicii-item">
                <div class="serviciu-item-container">
                    <div class="servicii-image"><img class="full-width" src="images/serviciu6.svg"></div>
                    <div class="serviciu-title">{!!$servicii_titlu6->content!!}</div>
                    {{-- <div class="serviciu-text">{!!$servicii_text6->content!!}</div> --}}
                </div>
                <div class="serviciu-linie"></div>
            </div>
        </div>
    </div>
    <div class = "container swiper-dispari">
        <div class = "servicii-mobile">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <div class="servicii-item">
                        <div class="serviciu-item-container">
                            <div class="servicii-image"><img class="full-width" src="images/serviciu1.svg"></div>
                            <div class="serviciu-title">{!!$servicii_titlu1->content!!}</div>
                            <div class="serviciu-text">{!!$servicii_text1->content!!}</div>
                        </div>
                        <div class="serviciu-linie"></div>
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="servicii-item">
                        <div class="serviciu-item-container">
                            <div class="servicii-image"><img class="full-width" src="images/serviciu2.svg"></div>
                            <div class="serviciu-title">{!!$servicii_titlu2->content!!}</div>
                            <div class="serviciu-text">{!!$servicii_text2->content!!}</div>
                        </div>
                        <div class="serviciu-linie"></div>
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="servicii-item">
                        <div class="serviciu-item-container">
                            <div class="servicii-image"><img class="full-width" src="images/serviciu3.svg"></div>
                            <div class="serviciu-title">{!!$servicii_titlu3->content!!}</div>
                            <div class="serviciu-text">{!!$servicii_text3->content!!}</div>
                        </div>
                        <div class="serviciu-linie"></div>
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="servicii-item">
                        <div class="serviciu-item-container">
                            <div class="servicii-image"><img class="full-width" src="images/serviciu4.svg"></div>
                            <div class="serviciu-title">{!!$servicii_titlu4->content!!}</div>
                            <div class="serviciu-text">{!!$servicii_text4->content!!}</div>
                        </div>
                        <div class="serviciu-linie"></div>
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="servicii-item">
                        <div class="serviciu-item-container">
                            <div class="servicii-image"><img class="full-width" src="images/serviciu5.svg"></div>
                            <div class="serviciu-title">{!!$servicii_titlu5->content!!}</div>
                            <div class="serviciu-text">{!!$servicii_text5->content!!}</div>
                        </div>
                        <div class="serviciu-linie"></div>
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="servicii-item">
                        <div class="serviciu-item-container">
                            <div class="servicii-image"><img class="full-width" src="images/serviciu6.svg"></div>
                            <div class="serviciu-title">{!!$servicii_titlu6->content!!}</div>
                            <div class="serviciu-text">{!!$servicii_text6->content!!}</div>
                        </div>
                        <div class="serviciu-linie"></div>
                    </div>
                  </div>
                </div>
                <!-- Add Pagination -->
                <!-- Add Arrows -->
            </div>
            <div class="swiper-button-next swiper-button-white"></div>
            <div class="swiper-button-prev swiper-button-white"></div>
            
        </div>
    </div>
</div>
<div class="index-about">
    <div class="container" id="container-index-about"></div>
    <div class="index-about-item" data-aos="fade-right">
        <div class="index-about-image"><img class="full-width" style="object-fit:cover;"
                src="{{ route('thumb', ['width:500',$aboutPicture1->images])}}"></div>
        <div class="index-about-text-container">
            <div class="index-about-title">{!!$aboutTitle1->content!!}</div>
            <div class="index-about-text">{!!$aboutText1->content!!}</div>
            <a style="display:block;" href="about" class="index-about-link">
                <div class="about-link">{{ __('site.afla') }}</div>
            </a>
        </div>
    </div>
    <div class="index-about-item-reverse" data-aos="fade-left">
        <div class="index-about-image"><img class="full-width" style="object-fit:cover;" src="images/about2.png"></div>
        <div class="index-about-text-container-reverse">
            <div class="index-about-title text-reverse">{!!$aboutTitle2->content!!}</div>
            <div class="index-about-text-reverse text-reverse">{!!$aboutText2->content!!}</div>
            <a style="display:block;" href="partners" class="index-about-link-reversed">
                <div class="about-link">{{ __('site.afla') }}</div>
            </a>
        </div>
    </div>
    
</div>
@endsection
@push('scripts')
<script>
    AOS.init();

    $(document).ready(function () {
        var swiperServicii = new Swiper('.servicii-mobile .swiper-container', {
      pagination: {
        el: '.swiper-pagination',
        type: 'fraction',
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });

        if (screen.width <= 1024){
            $(".index-about-item").appendTo("#container-index-about");
            $(".index-about-item-reverse").appendTo("#container-index-about");
        }
    });
</script>
@endpush