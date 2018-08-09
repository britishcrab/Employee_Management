<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailTest extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $title;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name = 'test')
    {
        $this->name = $name;
        $this->title = sprintf('%sさんがコメントしました。', $name);;
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.comment_post_plain')
            ->subject('$this->title')
            ->with([
                'name'=>$this->name,
            ]);
    }
}
