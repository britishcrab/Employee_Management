<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendReminderEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $sender_name;
    protected $mail_to;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($sender_name, $mail_to)
    {
        $this->sender_name = $sender_name;
        $this->mail_to = $mail_to;
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $sender_name = $this->sender_name;
        $mail_to = $this->mail_to;

        $mail = new \App\Http\Controllers\MailController;
        $mail->ComentMailSend($sender_name, $mail_to);
        //
    }
}
