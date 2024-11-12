<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PresentationController  extends Controller
{      
    /**
    * Show the default error message.
    */
    public function notFound(){
        return view('pages.errors.404');
    }
    /**
    * Show the contact message template.
    */
    public function contact(){
        return view('components.emails.contact');
    }
}
