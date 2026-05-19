<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;


class FrontendController extends Controller
{
    //waiting for develop



    public function pageTemplate($slug)
    {
        switch ($slug) {
            case 'home':
                return redirect('/');
                break;
            case 'about':
                return view('frontend.about');
                break;
            case 'members' :
                return view('frontend.member');
                break;
        }
    }
}
