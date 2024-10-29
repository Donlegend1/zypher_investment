<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    function index()  {
        return view("welcome");
        
    }

    
    function about() {
        return view("about");
    }
    
    function affiliate() {
        return view("affiliate");
    }
    
    function plan() {
        return view('plan');
    }
    
    function faq() {
        return view('faq');
        
    }
    function contact() {
        return view('contact');
    }
  
}