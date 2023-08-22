<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function all_report()
    {

        return view ('backend.pages.Report.allreport');  
    
    }

    public function guest_list_report()
    {

        return view ('backend.pages.Report.guestlist');  

    
    }
}
