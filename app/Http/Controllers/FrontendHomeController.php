<?php

namespace App\Http\Controllers;

class FrontendHomeController extends Controller
{
    public function home()
    {
        return view('frontend.pages.master');
    }

}
