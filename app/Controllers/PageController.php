<?php

namespace App\Controllers;

class PageController extends BaseController
{
    public function home()
    {
        return view('pages/home');
    }

    public function about()
    {
        return view('pages/about');
    }

    public function solution()
    {
        return view('pages/solution');
    }

    public function features()
    {
        return view('pages/features');
    }

    public function pricing()
    {
        return view('pages/pricing');
    }
}
