<?php

namespace App\Http\Controllers;

use App\Mail\welcomeemail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    // public function sendEmail(){
    //     $toEmail = "ajharuli440@gmail.com";
    //     $moreUser = "mdajharulislam327@gmail.com";
    //     $message = "Hello , welcome to our website ";
    //     $subject = "welcome";
    //      $details=[
    //         'name'=> 'jon deo',
    //         'price'=>'20',
    //         'cetagory'=>'fruit'
    //      ];


    //   $request =  Mail::to($toEmail)->cc($moreUser)
    //     ->send(new welcomeemail($message, $subject, $details));
    
    // dd($request);
    //     }


    // send email with attachment file

    public function sendContactEmail(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'subject'=>'required|min:5|max:100',
            'message'=>'required|min:10|max:255',
            'attachment'=>'required|mimes:pdf,doc,docx,xls|max:2048'
        ]);

        $fileName = time(). "." . $request->file('attachment')->extension();
        $request->file('attachment')->move('uploads',$fileName);

      $adminEmail= 'ajharuli440@gmail.com';
         $response =  Mail::to($adminEmail)
      ->send(new welcomeemail($request->all(), $fileName));
    
        if($response){
        return back()->with('success', "thanks for contacting us");
        }else{
          return back()->with('error', "unable to submit form, please try again");
        }


    }
}
