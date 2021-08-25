<header id="header" @if(Request::path()!="/") class="pages-header" @endif @if(Request::path()=="/") class = "index-header-mobile" @endif>
    <div class="container">
        <div class="header-container">
            <div class="header-logo">
                <a href="/" style="display:block;">
                    <img class="full-width" src="images/logo.svg">
                </a>
            </div>
            <div class="header-items-container">
                <div class="header-item one @if(Request::path() == 'services') one-active @endif @if(Request::path() == 'recruit') none-active @endif"><a href="services"
                        class="header-item-link">{{ __('site.servicii') }}</a>
                </div>
                <div class="header-item two @if(Request::path() == 'about') two-active @endif"><a href="about"
                        class="header-item-link">{{ __('site.despre') }}</a></div>
                <div class="header-item three @if(Request::path() == 'jobs' || Request::is('job-detail/*')) three-active @endif"><a href="jobs"
                        class="header-item-link">{{ __('site.joburi') }}</a></div>
                <div class="header-item four @if(Request::path() == 'partners') four-active @endif"><a href="partners"
                        class="header-item-link">{{ __('site.parteneri') }}</a>
                </div>
                <div class="header-item five @if(Request::path() == 'contact') five-active @endif"><a href="contact"
                        class="header-item-link">contact</a></div>
                <div class="header-item lang-item">
                    <a href="locale/ro">RO</a>
                    <div class="lang-linie">/</div>
                    <a href="locale/en">EN</a>
                </div>
                <linie></linie>
            </div>
            <div class="topmenu">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>
        </div>
        @if(Request::path()!='/')
        <form class="search-container" method="get" action="{{ url('/jobs') }}">
            <input class="search-input" type="text" name="q" placeholder=" {{ __('site.job') }}" @if (request()->has('q')) value="{{request()->get('q', '')}}" @endif >
            {{-- <input class="search-input" type="text" name="oras" placeholder=" {{ __('site.oras') }}"> --}}
            <select name="location" class="search-input search-locatie" @if (request()->has('location')) value="{{request()->get('location', '')}}" @endif ></select>
            <button type="submit" class="search-button">
                <div class="search-button-container">
                    <div class="search-button-text">
                        {{ __('site.cauta') }}
                    </div>
                    <div calss="search-burtton-image">
                        <img src="images/lupa.svg">
                    </div>
                </div>
            </button>
        </form>
        @endif
    </div>

    
</header>
@push('scripts')
<script>

$(document).ready(function () {
    $('.search-locatie').select2({
        placeholder: '{{ __('site.oras') }}',
        theme: "classic",
        data: @json([['id'=>'', 'text'=>'']]+\App\Location::get()->map(function ($location) { return ['id' => $location->id, 'text' => $location->name ]; })->all() ),
    });
 });
</script>
@endpush