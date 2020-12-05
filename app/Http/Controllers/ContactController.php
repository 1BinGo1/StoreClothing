<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function delivery(){
        return view('contact.delivery');
    }

    public function about(){
        return view('contact.about');
    }
}
