<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\DemoMail;

class MailController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $mailData = [
            'title' => 'Mail from '.env('APP_NAME'),
            'body' => 'This is for testing email using smtp.'
        ];
         
        Mail::to('happitohelp001@gmail.com')->send(new DemoMail($mailData));
           
        dd("Email is sent successfully.");
    }
}
