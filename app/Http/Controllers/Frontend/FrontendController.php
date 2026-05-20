<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;


class FrontendController extends Controller
{
    //waiting for develop

    public function index(){
        return view('frontend.index');
    }


    public function defaultPage($slug){
       return view('frontend.default_page');
    }



    public function pageTemplate($slug)
    {
        switch ($slug) {
            case 'home':
                return redirect()->route('index');
            
            case 'about':
                return view('frontend.about');
              
            case 'board-of-director':
                return view('frontend.member');
              
            case 'employee-quarterly':
                return view('frontend.employee_quaterly');
              
            case 'our-product':
                return view('frontend.product');
               
            case 'press-release':
                return view('frontend.notice');
              
            case 'reports':
                return view('frontend.report');
               
            case 'album':
                return view('frontend.album');
             
            case 'vacancy-result':
                return view('frontend.vacancy_result');
               
            case 'open-vacancy-position':
                return view('frontend.vacancy');
               
            case 'blogs':
                return view('frontend.blogs');
               
            case 'contact':
                return view('frontend.contact');
              
            default:
                abort(404);
        }
    }
}
