<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailTest;

class MailController extends Controller
{
    public function testmail()
    {
        $name = 'nisida yuya';
        $text = 'testメールの送信。';
        $to = 'yuya.nishida@axas-japan.co.jp';
        Mail::to($to)->send(new MailTest($name, $text));
    }
    //
}
