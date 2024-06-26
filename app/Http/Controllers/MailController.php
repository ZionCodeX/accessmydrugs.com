<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use \App\Mail\SendMail;

class MailController extends Controller
{

    public $data;

    public static function mailsend($xdata)
    {

            //mail body contents
            $data['from'] = $xdata["from"];
            $data['to'] = $xdata["to"];
            $data['email_title'] = $xdata["email_title"];
            $data['message_title'] = $xdata["message_title"];
            $data['message_body'] = $xdata["message_body"];
            $data['message_designation'] = $xdata["message_designation"];
            $data['mail_template'] = $xdata["mail_template"];
        
            //send mail
            //\Mail::to($data["to"])->send(new SendMail($data));

            //check and respond to mail request
            if (\Mail::to($data["to"])->send(new SendMail($data))) 
            {   
                //dd('failed');
                $send_status = 'SUCCESS';
                return $send_status;
                //return back()->with('failed','Your message failed delivery, please try again or contact the Admin');
            }
            else{   
                //dd('successful');
                $send_status = 'FAILED';
                return $send_status;
                return view('pages.payment-status-failed');
                //return back()->with('success','Mail was Succeessfully sent.');
            }
    }


    //MAIL DESIGN PAGES PREVIEW
    public function preview()
    {
        return view('emails.general_email');
    }




    


//END OF EMAIL CONTROLLER
}