@extends('parts.template') @section('content')
<div class="container link-container">
    <a href="jobs" class="pages-link-long">
        <div class="actual-page">{{ __('site.joburi') }}</div>
    </a>
</div>
<div class="container">
    <div class = "jobs-filter-mobile-button">
        <div class = "jobs-filter-mobile-text">{{ __('site.filter') }}</div>
        <div class = "jobs-filter-mobile-image"><img src = "images/filter.svg" class = "full-width"></div>
    </div>
    <div class="index-title joburi-title">{{ __('site.joburi') }}</div>
    <div class="jobs-container">
        <div class="filter-container">
            <div class="job-filter-container">
                <div class="job-filter-title">{{ __('site.tip-job') }}</div>
                <div class="job-check">
                    <input class="filtru-redirect checkbox-style" type="checkbox" name="tip" data-value="fulltime"
                        id="filtru-tip-full-time"
                        {{array_search('fulltime', request()->get('tip', [])) !== false ? 'checked="checked"':''}}>
                    <label for="filtru-tip-full-time" class="job-check-title">Full-time</label>
                </div>
                <div class="job-check">
                    <input class="filtru-redirect checkbox-style" type="checkbox" name="tip" data-value="partime"
                        id="filtru-tip-part-time"
                        {{array_search('partime', request()->get('tip', [])) !== false ? 'checked="checked"':''}}>
                    <label for="filtru-tip-part-time" class="job-check-title">Part-time</label>
                </div>
                <div class="job-check">
                    <input class="filtru-redirect checkbox-style" type="checkbox" name="tip" data-value="internship"
                        id="filtru-tip-internship"
                        {{array_search('internship', request()->get('tip', [])) !== false ? 'checked="checked"':''}}>
                    <label for="filtru-tip-internship" class="job-check-title">Internship</label>
                </div>
                <div class="job-check">
                    <input class="filtru-redirect checkbox-style" type="checkbox" name="tip" data-value="freelance"
                        id="filtru-tip-freelance"
                        {{array_search('freelance', request()->get('tip', [])) !== false ? 'checked="checked"':''}}>
                    <label for="filtru-tip-freelance" class="job-check-title">Freelance</label>
                </div>


                <div class="job-filter-title">{{ __('site.experienta-job') }}</div>
                <div class="job-check">
                    <input class="filtru-redirect checkbox-style" type="checkbox" name="exp" data-value="any"
                        id="filtru-exp-orice"
                        {{array_search('any', request()->get('exp', [])) !== false ? 'checked="checked"':''}}>
                    <label for="filtru-exp-orice" class="job-check-title">All levels</label>
                </div>
                <div class="job-check">
                    <input class="filtru-redirect checkbox-style" type="checkbox" name="exp" data-value="entry"
                        id="filtru-exp-entry"
                        {{array_search('entry', request()->get('exp', [])) !== false ? 'checked="checked"':''}}>
                    <label for="filtru-exp-entry" class="job-check-title">Entry level</label>
                </div>
                <div class="job-check">
                    <input class="filtru-redirect checkbox-style" type="checkbox" name="exp" data-value="mid"
                        id="filtru-exp-mid"
                        {{array_search('mid', request()->get('exp', [])) !== false ? 'checked="checked"':''}}>
                    <label for="filtru-exp-mid" class="job-check-title">Mid level</label>
                </div>
                <div class="job-check">
                    <input class="filtru-redirect checkbox-style" type="checkbox" name="exp" data-value="high"
                        id="filtru-exp-high"
                        {{array_search('high', request()->get('exp', [])) !== false ? 'checked="checked"':''}}>
                    <label for="filtru-exp-high" class="job-check-title">High level</label>
                </div>


                <div class="job-filter-title">{{ __('site.loc-job') }}</div>
                    <div class="search-container-job">
                        <div class="search-job-image">
                            <img class="full-width" src="images/search.svg">
                        </div>
                        <input class="input-search-job" type="text" name="search-locatie"
                            placeholder="{{ __('site.cauta-locatia') }}">
                    </div>
                <div class="locations-list">
                    @foreach ($location as $loc)
                    <div class="job-check">
                        <input class="filtru-redirect checkbox-style" type="radio" name="location"
                            data-value="{{$loc['id']}}" id="filtru-loc-{{$loc['id']}}"
                            {{request()->get('location') == $loc['id'] ? 'checked="checked"':''}}>
                        <label for="filtru-loc-{{$loc['id']}}"
                            class="job-check-title">{{$loc['name']}}</label>
                    </div>
                    @endforeach
                </div>



                <div class="job-filter-title">{{ __('site.cat-job') }}</div>

                    <div class="search-container-job">
                        <div class="search-job-image">
                            <img class="full-width" src="images/search.svg">
                        </div>
                        <input class="input-search-job" type="text" name="search-categorie"
                            placeholder="{{ __('site.cauta-cat') }}">
                    </div>

                    <div class = "categories-list">
                        @foreach ($categories as $category)
                        <div class="job-check">
                            <input class="filtru-redirect checkbox-style" type="radio" name="category"
                                data-value="{{$category['id']}}" id="filtru-category-{{$category['id']}}"
                                {{request()->get('category') == $category['id'] ? 'checked="checked"':''}}>
                            <label for="filtru-category-{{$category['id']}}"
                                class="job-check-title">{{$category['name']}}</label>
                        </div>
                        @endforeach
                    </div>




            </div>
        </div>






        <div class="jobs">
            @if($jobs !== null)
            @foreach($jobs as $job)
            <div class="job-element">
                @if($job->image!=null)
                <div class="job-logo">
                    <div class="job-logo-image"><img class="full-width job-image-image" src="{{ route('thumb', ['width:200',$job->image])}}"></div>
                </div>
                @endif
                <div class="job-time">{{ __('site.valabil') }} {{\Carbon\Carbon::parse($job->date)->format('d-m-Y')}}</div>
                <div class="job-title">{{$job->title}}</div>
                <div class="job-location">{{$job->locatie['name']}}, {{$job->Country}}</div>
                <div class="job-description">{!!str_limit($job->Description,166,$end = '...')!!}</div>
                <a href="job-detail/{{$job->id}}" style="display:block;">
                    <div class="detaliu-job">{{ __('site.vezi-detalii') }}</div>
                </a>
            </div>
            @endforeach
            <i aria-hidden="true" class="hidden-elements"></i>
            @else
            <div class = "no-exists">{{ __('site.no-jobs') }}</div>
            @endif

        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function () {


        if(screen.width<=1024)
    $(".filter-container").appendTo(".mobile-filter");

        function initFilters(container) {
            container.find('.filtru-redirect').on('change', function (event) {
                var $this = $(this);
                var key = $this.attr('name');
                var value = $this.attr('data-value');
                var urlQuery = getJsonFromUrl();
                if ($this.attr('type') == 'checkbox') {
                    if (this.checked) {
                        // add to urlquery and redirect
                        if (!urlQuery.hasOwnProperty(key)) urlQuery[key] = [];
                        if (urlQuery[key].indexOf(value) === -1) urlQuery[key].push(value);
                    } else {
                        // remove from to urlquery and redirect
                        if (urlQuery.hasOwnProperty(key)) {
                            var valueFoundIndex = urlQuery[key].indexOf(value);
                            if (valueFoundIndex !== -1) urlQuery[key].splice(valueFoundIndex, 1);
                        }
                    }
                }
                if ($this.attr('type') == 'radio') {
                    urlQuery[key] = value;
                }
                applyFilters(urlQuery);
            });
        }
        initFilters($('body'));

        var searchLocationTimeout = null;

        // live search locatie
        $('[name=search-locatie]').on('input',function(event){
            var $this = $(this);
            if(searchLocationTimeout) clearTimeout(searchLocationTimeout);
            searchLocationTimeout = setTimeout(function(){
                $.ajax({
                    method:'post',
                    url:'/search-locations',
                    data:{
                        name:$this.val()
                    },
                }).then(function(response){
                    var htmlresult = '';
                    $.each(response, function (key, value) {
                        htmlresult += ''+
                            '<div class="job-check">'+
                            '    <input class="filtru-redirect checkbox-style" type="radio" name="location"'+
                            '        data-value="'+value.id+'" id="filtru-category-'+value.id+'">'+
                            '    <label for="filtru-category-'+value.id+'"'+
                            '        class="job-check-title">'+value.name+'</label>'+
                            '</div>'+
                        '';
                    });
                    $('.locations-list').html(htmlresult);
                    initFilters($('.locations-list'));
                });
            },300);
        });

        //live search categorii
        $('[name=search-categorie]').on('input',function(event){
            var $this = $(this);
            if(searchLocationTimeout) clearTimeout(searchLocationTimeout);
            searchLocationTimeout = setTimeout(function(){
                $.ajax({
                    method:'post',
                    url:'/search-category',
                    data:{
                        name:$this.val()
                    },
                }).then(function(response){
                    var htmlresult = '';
                    $.each(response, function (key, value) {
                        htmlresult += ''+
                            '<div class="job-check">'+
                            '    <input class="filtru-redirect checkbox-style" type="radio" name="category"'+
                            '        data-value="'+value.id+'" id="filtru-category-'+value.id+'">'+
                            '    <label for="filtru-category-'+value.id+'"'+
                            '        class="job-check-title">'+value.name+'</label>'+
                            '</div>'+
                        '';
                    });
                    $('.categories-list').html(htmlresult);
                    initFilters($('.categories-list'));
                });
            },300);
        });

    });

    function applyFilters(urlQuery) {
        var newlocation = location.pathname + "?";
        var firstParam = true;
        $.each(urlQuery, function (key, value) {
            if (!firstParam) newlocation += "&";
            firstParam = false;
            if (typeof value == 'string') {
                newlocation += key + '=' + value;
            } else {
                var firstParamChild = true;
                $.each(value, function (index, valueChild) {
                    if (!firstParamChild) newlocation += "&";
                    firstParamChild = false;
                    newlocation += key + '[]=' + valueChild;
                });
            }
        });
        location.href = newlocation;
    }

    function getJsonFromUrl(url) {
        if (!url) url = location.href;
        var question = url.indexOf("?");
        var hash = url.indexOf("#");
        if (hash == -1 && question == -1) return {};
        if (hash == -1) hash = url.length;
        var query = question == -1 || hash == question + 1 ? url.substring(hash) :
            url.substring(question + 1, hash);
        var result = {};
        query.split("&").forEach(function (part) {
            if (!part) return;
            part = part.split("+").join(" "); // replace every + with space, regexp-free version
            var eq = part.indexOf("=");
            var key = eq > -1 ? part.substr(0, eq) : part;
            var val = eq > -1 ? decodeURIComponent(part.substr(eq + 1)) : "";
            var from = key.indexOf("[");
            if (from == -1) result[decodeURIComponent(key)] = val;
            else {
                var to = key.indexOf("]", from);
                var index = decodeURIComponent(key.substring(from + 1, to));
                key = decodeURIComponent(key.substring(0, from));
                if (!result[key]) result[key] = [];
                if (!index) result[key].push(val);
                else result[key][index] = val;
            }
        });
        return result;
    }

    $(".jobs-filter-mobile-button").click(function () {
      if ($('.mobile-filter').hasClass('afisat')) {
        $('.mobile-filter').removeClass('afisat');
        
        $(".mobile-filter").css({
            right: left_item_button + 'px'
          });
      } else {
        if(screen.width<=1024){
            $('.mobile-filter').addClass('afisat');
            $(".overlay-darker").css('right','0');
        }
  
        $(".mobile-filter").css({
            right: '0'
          }
  
        );
      }
    });

    
    $(".close-filter").click(function() {
    if($('.mobile-filter').hasClass('afisat')) {
      $('.mobile-filter').removeClass('afisat');
      $('.overlay-darker').removeClass('afisat');
      $(".overlay-darker").css('right','100%');
      

      $(".mobile-filter").css( {
          right:'100%'
        }


      );
    }
  }
);



    
</script>
@endpush

