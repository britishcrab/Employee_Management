<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailTest;

class MailController extends Controller
{
    public function ComentMailSend($sender_name, $mail_to)
    {
        $name = $sender_name;
        $to = $mail_to;
        Mail::to($to)->send(new MailTest($name));
    }
}
