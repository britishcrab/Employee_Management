<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailTest;

class MailController extends Controller
{
    public function ComentMailSend($name, $mail)
    {
//        $name = 'nisida yuya';
        $text = '';
        $to = $mail;
        Mail::to($to)->send(new MailTest($name, $text));
    }
    //
}
