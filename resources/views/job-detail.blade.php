@extends('parts.template') @section('content')
<div class="container link-container">
    <a href="jobs" class="pages-link-long">
        <div class="actual-page">{{ __('site.parteneri') }} | {{$job->title}} </div>
    </a>
</div>

<div class="container">
    <div class="job-detail-container">
        <div class="job-top">
            <div class="job-image">
                <img class="job-img" src="{{ route('thumb', ['width:1000',$job->image])}}">
            </div>
            <div class="job-details">
                <div class="job--detail-title">{{$job->title}}</div>
                <div class="job-location">{{$job->locatie['name']}}, {{$job->Country}}</div>
                <div class="job-contact-container">
                    <div class="job-date-contact">{{ __('site.job-contact') }}</div>
                    <div class="job-row-contianer">
                        <div class="job-row">
                            <div class="job-row-left">Website:</div>
                            <div class="job-row-right"><a href="//{{$job->website}}"
                                    class="job-row-link">{{$job->website}}</a></div>
                        </div>
                        <div class="job-row">
                            <div class="job-row-left">{{ __('site.domeniu') }}</div>
                            <div class="job-row-right">{{$job->categorie['name']}}</div>
                        </div>
                        <div class="job-row">
                            <div class="job-row-left">{{ __('site.job-address') }}</div>
                            <div class="job-row-right">{{$job->Address}}, {{$job->locatie['name']}}, {{$job->Country}}</div>
                        </div>
                        <div class="job-row">
                            <div class="job-row-left">{{ __('site.job-phone') }}</div>
                            <div class="job-row-right"><a href="tel:{{$job->Phone}}"
                                    class="job-row-link">{{$job->Phone}}</a></div>
                        </div>
                        <div class="job-row">
                            <div class="job-row-left width-mobile">Email:</div>
                            <div class="job-row-right"><a href="mailto:{{$job->Email}}"
                                    class="job-row-link">{{$job->Email}}</a></div>
                        </div>
                    </div>
                    <form class="upload-resume" action='{{ action("JobController@submit_file") }}' method='post' class="forms" id="form-cv">
                        <input type="hidden" id="form-cv-jobid" name="jobid" value="{{$job->id}}">
                        <input type="hidden" name="email" value="{{$job->Email}}">
                        <div class="btn-upload">
                            <img class="img-upload" src="images/upload.svg">
                            <div id="file-choosen">{{ __('site.incarca') }}</div>
                            <input type="file" name="cv" id="myFileSelected" placeholder="{{ __('site.incarca') }}"
                                accept="application/pdf">
                        </div>
                        <button class="upload-cv-btn" type="submit">{{ __('site.aplica') }}</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="job-description job-description-modified">
            @if($job->Description!=null)
            <div class="job-description-title">{{ __('site.descriere') }}</div>
            @if(strlen($job->Description)<=445)
            <div class="job-description-text">{!!$job->Description!!}</div>
            @else
            <div class="job-description-text">{!!($job->Description)!!}</div>
            <div class="read-more">{{ __('site.read-more') }}</div>
            @endif
            @endif
            <div class="job-description-title trimite">{{ __('site.share') }}</div>
            <div class="social-contianer">
            <a style="display:block;" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{URL::to('/')}}/job-detail/{{$job->id}}"><img class="social-image" src="images/facebook-job.svg"></a>
                <a style="display:block;" href="https://twitter.com/intent/tweet?url={{URL::to('/')}}/job-detail/{{$job->id}} target="_blank""><img class="social-image" src="images/twitter-job.svg"></a>
                {{-- <a style = "display:block;" href = ""><img class = "social-image" src = "images/tumblr-job.svg"></a> --}}
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $('.read-more').click(function () {
            if($('.job-description-text').hasClass('afisat')){
            $('.job-description-text').css("max-height","195px");
            $('.job-description-text').removeClass('afisat');
            }else{
                if(screen.width>=1024){
                    $('.job-description-text').css("max-height","1000px");
                     $('.job-description-text').addClass('afisat')
                }else{
                    $('.job-description-text').css("max-height","2000px");
                     $('.job-description-text').addClass('afisat')
                }
            }
        }); 

    $(".btn-upload").click(function () {
        $('#myFileSelected').change(function () {
            var nume_fisier = $('#myFileSelected').val();
            nume_fisier_modificat = nume_fisier.split("\\");
            console.log($('#myFileSelected').val());
            if (nume_fisier) {
                $("#file-choosen").text(nume_fisier_modificat[nume_fisier_modificat.length - 1]);
            } else {
                $("#file-choosen").text("{{ __('site.incarca') }}");
            }
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
      $.ajaxSetup({

        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
      });

      var $formContact = $('.upload-resume');
      $formContact.on('submit', function (event) {
        var formData = new FormData(this);
        event.preventDefault();
        $.ajax({
          method: 'POST',
          url: '{{ action("JobController@submit_file") }}',
          data: formData,
          processData: false,
          contentType: false,
          context: this,
          async: true,
          cache: false,
          dataType: 'json'
        }).done(function (res) {
          console.log(res.success);
          if (res.success == true) {
            $.notify(res.msg, "success");

            setTimeout(function () {
              window.location.reload();
            }, 4000);
          } else {
            $.notify(res.msg, "error");
          }
        });
        return;
      });

    });
  </script>
@endpush