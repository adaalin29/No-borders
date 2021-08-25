@extends('parts.template') @section('content')
<div class="container link-container">
    <a href="contact" class="pages-link">
        <div class="actual-page">Contact</div>
    </a>
</div>
<div class = "container">
    <div class = "contact-container">
        <div class = "contact-left">
            <div class = "contact-title">Contact</div>
            <div class = "contact-info">{{ __('site.telephone') }}: <a href = "tel:{!!$contactTelefon->content!!}" class = "contact-link">{!!$contactTelefon->content!!}</a></div>
            {{-- <div class = "contact-info">{{ __('site.fax') }}: <a href = "tel:{{setting('site.fax')}}" class = "contact-link">{{setting('site.fax')}}</a></div> --}}
            <div class = "contact-info">Email: <a href = "mailto:{{setting('site.email')}}" class = "contact-link">&nbsp{{setting('site.email')}}</a></div>
            <div class = "contact-info">{{__('site.office')}}: <a href = "mailto:{{setting('site.office')}}" class = "contact-link">&nbsp{{setting('site.office')}}</a></div>
            <div class = "contact-info">{{ __('site.sediu') }}: {!!$contactSediu->content!!}</div>
            <div class = "contact-info">{{ __('site.program') }}: {!!$contactProgram->content!!}</div>
            <div class = "contact-info">{{__('site.cod')}}: {!!$contactCod->content!!}</div>
            <div class = "contact-questions">{{ __('site.intrebari') }}</div>
            <form class= "contact-form" action='{{ action("ContactController@send_message") }}' method="post">
                <input class= "contact-form-element" type="text" id="fname" name="name" placeholder="{{ __('site.nume') }}">
                <input class= "contact-form-element" type="email" id="femail" name="email" placeholder="Email">
                <textarea name="message" placeholder="{{ __('site.mesaj') }}"></textarea>
                <div class = "termeni">
                    <input class = "contact-checkbox" type="checkbox" id="accept-privacy" name="termeni" value="checkbox" style = "margin-right:10px;">
                    <div class = "termeni-text">{{ __('site.termeni-text') }}</div>
                </div>
                <div class = "send-button">
                    <button class="contact-button" type = "submit">{{ __('site.send') }}</button>
                </div>
            </form>
        </div>
        <div class = "contact-right">
            <div id="map-canvas" style="height:100%"></div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCmM1P-D5Zka0kPEbZSrsR90gpBlDxgm18"></script>
<script>
   function initialize() {

// 				var geocoder;

//         var address = "{{setting('site.adresa')}}";

// # Get marker data

var defaultMarkerLat = "{{setting('site.latitude')}}";

var defaultMarkerLng = "{{setting('site.longitude')}}";

var markerImg = '../images/marker.png';

var markerTitle = "No Borders";



// # Show map

var myLatlng = new google.maps.LatLng(defaultMarkerLat, defaultMarkerLng);

var mapOptions = {

    zoom: 17,

    center: myLatlng,

    scrollwheel: false,

    mapTypeId: google.maps.MapTypeId.ROADMAP,

    disableDefaultUI: true

}

var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

// # Show marker

var marker = new google.maps.Marker({



    position: myLatlng,

    map: map,

    // 					icon:{markerImg} ,
    icon: {
        url: "images/marker.png",
        scaledSize: new google.maps.Size(64, 64)
    },

    title: markerTitle
});

}

google.maps.event.addDomListener(window, 'load', initialize);

function mapsSelector() {
        if /* if we're on iOS, open in Apple Maps */ ((navigator.platform.indexOf("iPhone") != -1) ||
            (navigator.platform.indexOf("iPad") != -1) ||
            (navigator.platform.indexOf("iPod") != -1))
            window.open(
                "http://maps.apple.com/?ll={{setting('site.latitude')}},{{setting('site.longitude')}}"
            );
        //      window.open("https://maps.google.com/maps?daddr={{setting('contact.contact-latitudine')}},{{setting('contact.contact-longitudine')}}&amp;ll=");
        else /* else use Google */
            window.open(
                "https://maps.google.com/maps?daddr={{setting('site.latitude')}},{{setting('site.longitude')}}&amp;ll="
            );
    }
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
      $.ajaxSetup({
  
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
      });
      var $formContact = $('.contact-form');
      $('.contact-button').on('click', function (event) {
        event.preventDefault();
        $.ajax({
          method: 'POST',
          url: '{{ action("ContactController@send_message") }}',
          data: $formContact.serializeArray(),
          context: this,
          async: true,
          cache: false,
          dataType: 'json'
        }).done(function (res) {
          console.log(res);
          if (res.success == true) {
            $.notify(res.successMessage, "success");
            setTimeout(function () {
              window.location.reload();
            
            }, 4000);
          } else {
            var eroare = res.error;
          for (var i = 0; i < eroare.length; i++) {
            eroare[i] = eroare[i] + "\n";
          }
            $.notify(res.error, {
              type: "error",
              breakNewLines: true,
              gap:2
            });
          }
        });
        return;
      });
  
    });
  </script>
@endpush