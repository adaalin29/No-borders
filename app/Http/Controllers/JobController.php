<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Category;
use App\Location;
use App\Job;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Input;
use App\Mail\SendMessageCareers;
use Carbon\Carbon;


class JobController extends Controller{
    
    public function job_detail($url_slug){
        
        $job = Job::where('id',$url_slug)->firstOrFail();
        return view ('job-detail',[
            'job'=>$job,
        ]);

    }

    public function jobs(){
        
        $categories = Category::get();
        $location = Location::get();

        $today = Carbon::today()->format('Y-m-d');

        $jobfilter = new Job;
        $jobfilter = $jobfilter->orderBy("created_at",'desc');
        $jobfilter = $jobfilter->where('date','>=', $today);

        if (request()->get('tip')) {
            $jobfilter = $jobfilter->whereIn('tip', request()->get('tip'));
        }

        if (request()->get('exp')) {
            if (array_search('any', request()->get('exp')) === false) {
                $jobfilter = $jobfilter->whereIn('exp', request()->get('exp'));
            }
        }

        if (request()->get('location')) {
            $locationfilter = request()->get('location');
            $jobfilter = $jobfilter->whereHas('locatie', function ($query) use ($locationfilter) {
                $query->where('id', $locationfilter);
            });
        }

        if (request()->get('category')) {
            $category = request()->get('category');
            $jobfilter = $jobfilter->whereHas('categorie', function ($query) use ($category) {
                $query->where('id', $category);
            });
        }
        
        if (request()->q) {
            $jobfilter = Job::search(request()->q)->constrain($jobfilter);
        }
        $jobs = $jobfilter->get();
        
        return view ('jobs', [
            'categories'=> $categories,
            'location'=> $location,
            'jobs'=>$jobs,
        ]);




    }
    public function seearch_location(){
        $locations = Location::where('name', 'like', '%'.request()->name.'%')->get();
        return $locations;
    }

    public function search_category(){
        $categories = Category::where('name', 'like', '%'.request()->name.'%')->get();
        return $categories;
    }

    public function submit_file(Request $request){
        
            $email = setting('site.email-jobs');
            // $email = $request->email;
    
           $form_data = $request->only(['cv']);
           $validationRules = [
            //    'email'         => ['required','email']
               'cv'         => ['required'],
           ];
         
           $validationMessages = [
            //    'email.email'    => "Trebuie sa introduci o adresa de :attribute valida!",        
            //    'email.required'    => "Campul email este obligatoriu!"
               'cv.required' => __('site.obligatoriu-cv')
           ];
         $document = null;
         if($request->file('cv')){ 
          $document = Input::file('cv');
         
          if ($document->getError() == 1) {
               $max_size = $document->getMaxFileSize() / 1024 / 1024;  // Get size in Mb
               $error = __('site.cv-size') . $max_size . 'Mb.';
               return ['success' => false, 'msg' => $error];  
           }
           
           if ($document->getClientMimeType() !== 'application/pdf')
           {
             return ['success' => false, 'msg' => __('site.insert-pdf')];  
           }
         }
         
        //    $date_de_salvat = [
        //      'email' => $request->input('email'),
        //      'cv' => $document != null ? 'Da' : 'Nu',
        //    ];
         
        
        $validator = Validator::make($form_data, $validationRules, $validationMessages);
        if ($validator->fails())
        return ['success' => false, 'msg' => $validator->errors()->all()];  
        else{
            $job = Job::find($request->jobid);
            $jobname = optional($job)->title ?: 'Job';
          
             $date_de_trimis = [
                //  'email' => $request->input('email'),
                 'cv' => $document,
                 'job' => $jobname,
               ];
            //    $date_salvare = new Message;
            //    $date_salvare->email = $request->input('email');
            //    $date_salvare->cv = $request->file('cv') ? "Da" : "Nu";
   //           dd($date_salvare);
            //    $date_salvare->save();
             
               Mail::to($email)->send(new SendMessageCareers($date_de_trimis));
               return ['success' => true,'msg'=> __('site.message-succesfull')];
           }
                 
       }
}