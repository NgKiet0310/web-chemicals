<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function aboutMe() {
        return view('client.about-me'); // hoặc view bạn muốn hiển thị
    }
    public function aboutClient(){
        return view('client.about-client');
    }
    public function aboutPartner(){
        return view('client.about-partner');
    }
}

