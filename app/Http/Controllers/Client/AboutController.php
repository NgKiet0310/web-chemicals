<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function aboutMe() {
        return view('client.about.about-me');
    }

    public function aboutClient() {
        return view('client.about.about-client');
    }

    public function aboutPartner() {
        return view('client.about.about-partner');
    }
}
