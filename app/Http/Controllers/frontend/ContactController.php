<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;

class ContactController extends Controller
{

    function list() {

        return view('frontend.pages.Contact.list');

    }
    public function create()
    {
        return view('frontend.pages.Contact.create');
    }

}
