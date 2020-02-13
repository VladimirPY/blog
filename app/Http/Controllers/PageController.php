<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function About(){
        return view('services');
    }

    public function Contacts(){
        return view('contacts');
    }

    public function Services(){
        return view('services');
    }
}
