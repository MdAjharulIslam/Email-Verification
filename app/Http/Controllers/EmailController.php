<?php

namespace App\Http\Controllers;

use App\Mail\welcomeemail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail(){
        $toEmail = "ajharuli440@gmail.com";
        $moreUser = "mdajharulislam327@gmail.com";
        $message = "Hello , welcome to our website";
        $subject = "welcome";
         $details=[
            'name'=> 'jon doe',
            'price'=>'20',
            'cetagory'=>'fruit'
         ];


      $request =  Mail::to($toEmail)->cc($moreUser)
        ->send(new welcomeemail($message, $subject, $details));
    
    dd($request);
        }
}
