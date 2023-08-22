<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Payment;
class PaymentController extends Controller
{
    public function list()

    {

      $payments=Payment::all(); 
    
        return view('backend.pages.payment.list',Compact('payments'));


    }

        
        public function create()

    {
        return view('backend.pages.payment.create');
    
    }

   public function store(request $request){

    
$request->validate([
    'card'=>'required',
    'bkash'=>'required',
    'nagad'=>'required',
    'rocket'=>'required',

]); 

Payment::create([
'card'       =>$request->card,
'bkash'     =>$request->bkash,
'nagad'  =>$request->nagad,
'rocket'  =>$request->rocket,
'cash'  =>$request->cash,
'others'  =>$request->others,


]);
return redirect()->route('payment.list');



}
}

        
    
