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
        $categories = \App\Models\Category::where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->orderBy('name', 'asc')
            ->with('services')
            ->get();
        
        $services = \App\Models\Service::where('is_active', true)
            ->orderBy('category', 'asc')
            ->orderBy('name', 'asc')
            ->get();
            
        return view('frontend.services', compact('categories', 'services'));
    }

    public function servicesClone()
    {
        $categories = \App\Models\Category::where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->orderBy('name', 'asc')
            ->with('services')
            ->get();
        
        $services = \App\Models\Service::where('is_active', true)
            ->orderBy('category', 'asc')
            ->orderBy('name', 'asc')
            ->get();
            
        return view('frontend.services-clone', compact('categories', 'services'));
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
