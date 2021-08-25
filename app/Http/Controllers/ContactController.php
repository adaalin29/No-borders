<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use App\Mail\SendMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Validator;
use App\Statice;

class ContactController extends Controller
{
    public function index(){

        $contactTelefon = Statice::where("pag","contact-telefon")->withTranslations()->first()->translate(\App::getLocale());
        $contactSediu = Statice::where("pag","contact-sediu")->withTranslations()->first()->translate(\App::getLocale());
        $contactProgram = Statice::where("pag","contact-program")->withTranslations()->first()->translate(\App::getLocale());
        $contactCod = Statice::where("pag","contact-cod-postal")->withTranslations()->first()->translate(\App::getLocale());

        return view('contact',[

            'contactTelefon'=>$contactTelefon,
            'contactSediu'=>$contactSediu,
            'contactProgram'=>$contactProgram,
            'contactCod'=>$contactCod,
        ]);
    }

    public function send_message(Request $request){
        $contact_email = setting('site.email');
        $form_data = $request->only(['name','email', 'message','termeni']);
        $validationRules = [
            'name'    => ['required','min:3'],
            'email'   => ['required','email'],
            'message'   => ['required','min:10'],           
            'termeni'   => ['required'],
          
        ];
        $validator = Validator::make($form_data, $validationRules);
        if ($validator->fails())
            return ['success' => false, 'error' => $validator->errors()->all()];  
        else{ 
            Mail::to(strip_tags($contact_email))->send(new SendMessage($request->all()));

            return ['success' => true,'successMessage'=> __('site.message')];
        }      
    }
    
}