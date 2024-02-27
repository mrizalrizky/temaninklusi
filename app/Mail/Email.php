<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Email extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

     public function __construct(String $email, String $resetToken)
    {
        $subject = 'Reset Password Akun ' . config('app.name');
        $urlReset = config('app.url').'/reset-password?email='.$email.'&resetToken='.$resetToken;

        return $this->view('mail.reset-password')->from(config('mail.from.address'), config('mail.from.name'))->subject($subject)->with([
            'urlReset' => $urlReset,
        ]);
    }

    /**
     * Build the message.
     *
     * @return $this
     */

    public function build() {
        // $subject = 'Reset Password Akun ' . config('app.name');

        // return $this->view('mail.reset-password')->subject($subject)->with([
        //     'resetToken' => $this->resetToken,
        // ]);

    }

}
