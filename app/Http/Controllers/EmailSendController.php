<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use App\Models\ContactInfo;

class EmailSendController extends Controller
{
    public function MailSend (Request $request){
        try {
        $fullname = $request->fullname;
        $email = $request->email;
        $phone = $request->phone;
        $massage = $request->massage;

            ContactInfo::create([
               'fullname'=> $fullname,
                'email'=> $email,
                'phone'=> $phone,
                'massage'=> $massage,
            ]);

        Mail::to('info@hoffenlimited.com')->send(new SendMail($fullname,$email,$phone,$massage));
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }
}
