<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Statice;
use App\Picture;
use App\Partner;
use App\Job;
use Carbon\Carbon;
use App\Location;
use App\Gold;
use App\Bronse;
use App\Silver;

class IndexController extends Controller
{
    public function index()
    {
        $location = Location::get();
        $today = Carbon::today()->format('Y-m-d');
        $jobs = Job::where('date','>=', $today)->orderBy('created_at','desc')->take(4)->get();

        $index_title = Statice::where("pag","index-title")->withTranslations()->first()->translate(\App::getLocale());
        $index_subtitle = Statice::where("pag","index-subtitle")->withTranslations()->first()->translate(\App::getLocale());
        $jobs_title = Statice::where("pag","jobs-text")->withTranslations()->first()->translate(\App::getLocale());

        $servicii_titlu1 = Statice::where("pag","servicii-index-title1")->withTranslations()->first()->translate(\App::getLocale());
        $servicii_titlu2 = Statice::where("pag","servicii-index-title2")->withTranslations()->first()->translate(\App::getLocale());
        $servicii_titlu3 = Statice::where("pag","servicii-index-title3")->withTranslations()->first()->translate(\App::getLocale());
        $servicii_titlu4 = Statice::where("pag","servicii-index-title4")->withTranslations()->first()->translate(\App::getLocale());
        $servicii_titlu5 = Statice::where("pag","servicii-index-title5")->withTranslations()->first()->translate(\App::getLocale());
        $servicii_titlu6 = Statice::where("pag","servicii-index-title6")->withTranslations()->first()->translate(\App::getLocale());

        $servicii_text1 = Statice::where("pag","servicii-index-text1")->withTranslations()->first()->translate(\App::getLocale());
        $servicii_text2 = Statice::where("pag","servicii-index-text2")->withTranslations()->first()->translate(\App::getLocale());
        $servicii_text3 = Statice::where("pag","servicii-index-text3")->withTranslations()->first()->translate(\App::getLocale());
        $servicii_text4 = Statice::where("pag","servicii-index-text4")->withTranslations()->first()->translate(\App::getLocale());
        $servicii_text5 = Statice::where("pag","servicii-index-text5")->withTranslations()->first()->translate(\App::getLocale());
        $servicii_text6 = Statice::where("pag","servicii-index-text6")->withTranslations()->first()->translate(\App::getLocale());
       

        $aboutPicture1 = Statice::where("pag","idnex-about-picture1")->first();
        $aboutTitle1 = Statice::where("pag","index-about-title1")->withTranslations()->first()->translate(\App::getLocale());
        $aboutText1 = Statice::where("pag","index-about-text1")->withTranslations()->first()->translate(\App::getLocale());
        $aboutPicture2 = Statice::where("pag","idnex-about-picture2")->first();
        $aboutTitle2 = Statice::where("pag","index-about-title2")->withTranslations()->first()->translate(\App::getLocale());
        $aboutText2 = Statice::where("pag","index-about-text2")->withTranslations()->first()->translate(\App::getLocale());
        
        return view('index',[
            'index_title'=>$index_title,
            'index_subtitle'=>$index_subtitle,
            'jobs_title'=>$jobs_title,
            'servicii_titlu1'=>$servicii_titlu1,
            'servicii_titlu2'=>$servicii_titlu2,
            'servicii_titlu3'=>$servicii_titlu3,
            'servicii_titlu4'=>$servicii_titlu4,
            'servicii_titlu5'=>$servicii_titlu5,
            'servicii_titlu6'=>$servicii_titlu6,

            'servicii_text1'=>$servicii_text1,
            'servicii_text2'=>$servicii_text2,
            'servicii_text3'=>$servicii_text3,
            'servicii_text4'=>$servicii_text4,
            'servicii_text5'=>$servicii_text5,
            'servicii_text6'=>$servicii_text6,

            'aboutPicture1'=>$aboutPicture1,
            'aboutTitle1'=>$aboutTitle1,
            'aboutText1'=>$aboutText1,
            'aboutPicture2'=>$aboutPicture2,
            'aboutTitle2'=>$aboutTitle2,
            'aboutText2'=>$aboutText2,
            'jobs'=>$jobs,
            'location'=> $location,

        ]);

    }


    public function services()
    {
        $servicesTitle = Statice::where("pag","services-title")->withTranslations()->first()->translate(\App::getLocale());
        $servicesSubtitle = Statice::where("pag","services-subtitle")->withTranslations()->first()->translate(\App::getLocale());
        $video = Statice::where("pag","services-video")->withTranslations()->first()->translate(\App::getLocale());


        $ServiceTitle1 = Statice::where("pag","services-section-title1")->withTranslations()->first()->translate(\App::getLocale());
        $ServiceTitle2 = Statice::where("pag","services-section-title2")->withTranslations()->first()->translate(\App::getLocale());
        $ServiceTitle3 = Statice::where("pag","services-section-title3")->withTranslations()->first()->translate(\App::getLocale());
        $ServiceTitle4 = Statice::where("pag","services-section-title4")->withTranslations()->first()->translate(\App::getLocale());
        $ServiceTitle5 = Statice::where("pag","services-section-title5")->withTranslations()->first()->translate(\App::getLocale());
        $ServiceTitle6 = Statice::where("pag","services-section-title6")->withTranslations()->first()->translate(\App::getLocale());
        $ServiceText1 = Statice::where("pag","services-section-text1")->withTranslations()->first()->translate(\App::getLocale());
        $ServiceText2 = Statice::where("pag","services-section-text2")->withTranslations()->first()->translate(\App::getLocale());
        $ServiceText3 = Statice::where("pag","services-section-text3")->withTranslations()->first()->translate(\App::getLocale());
        $ServiceText4 = Statice::where("pag","services-section-text4")->withTranslations()->first()->translate(\App::getLocale());
        $ServiceText5 = Statice::where("pag","services-section-text5")->withTranslations()->first()->translate(\App::getLocale());
        $ServiceText6 = Statice::where("pag","services-section-text6")->withTranslations()->first()->translate(\App::getLocale());
        
      // Get all services from static from 1 to 6
      for($i=1; $i<6; $i++){
        // Prepare the title of the service according to ID
        $service_title  = "services-section-title".$i;
        // Prepare the text of the service according to ID
        $service_text   = "services-section-text".$i;
        // Create an array with needed values 
        $services[$i] = [
          'id' => $i,
          'title' => Statice::where("pag", $service_title)->withTranslations()->first()->translate(\App::getLocale()),
          'text'  => Statice::where("pag", $service_text)->withTranslations()->first()->translate(\App::getLocale()),
        ];
      }
//       dd($services);
        return view('services',[
            // Send services to view
            'services' => $services,
          
            'servicesTitle'=>$servicesTitle,
            'servicesSubtitle'=>$servicesSubtitle,
            'video'=>$video,
            'ServiceTitle1'=>$ServiceTitle1,
            'ServiceTitle2'=>$ServiceTitle2,
            'ServiceTitle3'=>$ServiceTitle3,
            'ServiceTitle4'=>$ServiceTitle4,
            'ServiceTitle5'=>$ServiceTitle5,
            'ServiceTitle6'=>$ServiceTitle6,
            'ServiceText1'=>$ServiceText1,
            'ServiceText2'=>$ServiceText2,
            'ServiceText3'=>$ServiceText3,
            'ServiceText4'=>$ServiceText4,
            'ServiceText5'=>$ServiceText5,
            'ServiceText6'=>$ServiceText6,

        ]);
    }

    public function about(){

        $partners = Partner::get();

        $AboutSectionTitle1 = Statice::where("pag","about-section-title1")->withTranslations()->first()->translate(\App::getLocale());
        $AboutSectionText1 = Statice::where("pag","about-section-text1")->withTranslations()->first()->translate(\App::getLocale());
        $AboutSectionUrl = Statice::where("pag","about-section-video1")->withTranslations()->first()->translate(\App::getLocale());
        $AboutSectionTitle2 = Statice::where("pag","about-section-title2")->withTranslations()->first()->translate(\App::getLocale());
        $AboutSectionText2 = Statice::where("pag","about-section-text2")->withTranslations()->first()->translate(\App::getLocale());
        $AboutSectionPicture2 = Statice::where("pag","about-section-picture2")->withTranslations()->first()->translate(\App::getLocale());
        $AboutSectionTitle3 = Statice::where("pag","about-section-title3")->withTranslations()->first()->translate(\App::getLocale());
        $AboutSectionText3 = Statice::where("pag","about-section-content3")->withTranslations()->first()->translate(\App::getLocale());

        $images = Picture::get();

        return view('about',[
            'AboutSectionTitle1'=>$AboutSectionTitle1,
            'AboutSectionText1'=>$AboutSectionText1,
            'AboutSectionUrl'=>$AboutSectionUrl,
            'AboutSectionTitle2'=>$AboutSectionTitle2,
            'AboutSectionText2'=>$AboutSectionText2,
            'AboutSectionPicture2'=>$AboutSectionPicture2,
            'AboutSectionTitle3'=>$AboutSectionTitle3,
            'AboutSectionText3'=>$AboutSectionText3,
            'images'=>$images,
            'partners'=>$partners,
        ]);
    }

    public function terms(){


        $termsText = Statice::where("pag","terms-conditions")->withTranslations()->first()->translate(\App::getLocale());

        return view('terms',[
            'termsText'=>$termsText,
        ]);
    }

    public function cookie(){


        $termsText = Statice::where("pag","cookies")->withTranslations()->first()->translate(\App::getLocale());

        return view('cookie',[
            'termsText'=>$termsText,
        ]);
    }

    public function politica(){


        $termsText = Statice::where("pag","politica")->withTranslations()->first()->translate(\App::getLocale());

        return view('politica',[
            'termsText'=>$termsText,
        ]);
    }

    public function partners(){

        $partners = Partner::get();

        $title1 = Statice::where("pag","partners-title1")->withTranslations()->first()->translate(\App::getLocale());
        $content1 = Statice::where("pag","partners-content1")->withTranslations()->first()->translate(\App::getLocale());
        $content2 = Statice::where("pag","partners-content2")->withTranslations()->first()->translate(\App::getLocale());
        $image1 = Statice::where("pag","partners-image1")->withTranslations()->first()->translate(\App::getLocale());
        $image2 = Statice::where("pag","partners-image2")->withTranslations()->first()->translate(\App::getLocale());

        return view('partners',[
            'title1'=>$title1,
            'content1'=>$content1,
            'content2'=>$content2,
            'image1'=>$image1,
            'image2'=>$image2,
            'partners'=>$partners,

        ]);
    }

    public function steps(){

        $title1 = Statice::where("pag","steps-title1")->withTranslations()->first()->translate(\App::getLocale());
        $title2 = Statice::where("pag","steps-title2")->withTranslations()->first()->translate(\App::getLocale());
        $title3 = Statice::where("pag","steps-title3")->withTranslations()->first()->translate(\App::getLocale());
        $content1 = Statice::where("pag","steps-content1")->withTranslations()->first()->translate(\App::getLocale());
        $content2 = Statice::where("pag","steps-content2")->withTranslations()->first()->translate(\App::getLocale());
        $content3 = Statice::where("pag","steps-content3")->withTranslations()->first()->translate(\App::getLocale());
        $image1 = Statice::where("pag","steps-image1")->withTranslations()->first()->translate(\App::getLocale());
        $image2 = Statice::where("pag","steps-image2")->withTranslations()->first()->translate(\App::getLocale());
        $image3 = Statice::where("pag","steps-image3")->withTranslations()->first()->translate(\App::getLocale());

        return view('steps',[
            'title1'=>$title1,
            'title2'=>$title2,
            'title3'=>$title3,
            'content1'=>$content1,
            'content2'=>$content2,
            'content3'=>$content3,
            'image1'=>$image1,
            'image2'=>$image2,
            'image3'=>$image3,
        ]);
    }

    public function recruit(){

        $title1 = Statice::where("pag","recruit-title1")->withTranslations()->first()->translate(\App::getLocale());
        $title2 = Statice::where("pag","recruit-title2")->withTranslations()->first()->translate(\App::getLocale());
        $title3 = Statice::where("pag","recruit-title3")->withTranslations()->first()->translate(\App::getLocale());
        $content1 = Statice::where("pag","recruit-content1")->withTranslations()->first()->translate(\App::getLocale());
        $content2 = Statice::where("pag","recruit-content2")->withTranslations()->first()->translate(\App::getLocale());
        $content3 = Statice::where("pag","recruit-content3")->withTranslations()->first()->translate(\App::getLocale());
        $image1 = Statice::where("pag","recruit-image1")->withTranslations()->first()->translate(\App::getLocale());
        $image2 = Statice::where("pag","recruit-image2")->withTranslations()->first()->translate(\App::getLocale());
        $image3 = Statice::where("pag","recruit-image3")->withTranslations()->first()->translate(\App::getLocale());

        $gold = Gold::withTranslations()->get()->translate(\App::getLocale());
        $silver = Silver::withTranslations()->get()->translate(\App::getLocale());
        $bronse = Bronse::withTranslations()->get()->translate(\App::getLocale());
        return view('recruit',[

            'title1'=>$title1,
            'title2'=>$title2,
            'title3'=>$title3,
            'content1'=>$content1,
            'content2'=>$content2,
            'content3'=>$content3,
            'image1'=>$image1,
            'image2'=>$image2,
            'image3'=>$image3,
            'gold'=>$gold,
            'silver'=>$silver,
            'bronse'=>$bronse,
        ]);
    }
    
}
