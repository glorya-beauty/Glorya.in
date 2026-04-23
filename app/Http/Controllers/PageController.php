<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        return view('frontend.about');
    }

    public function services()
    {
        return view('frontend.services');
    }

    public function servicesDetail()
    {
        return view('frontend.services-detail');
    }

    public function blog()
    {
        return view('frontend.blog');
    }

    public function blogDetails()
    {
        return view('frontend.blog-details');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function gallery()
    {
        return view('frontend.gallery');
    }
}
