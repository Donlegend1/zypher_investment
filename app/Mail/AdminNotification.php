<?php

// app/Mail/AdminNotification.php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $transaction;
    public $user;
    public $plan;

    public function __construct($transaction, $user, $plan)
    {
        $this->transaction = $transaction;
        $this->user = $user;
        $this->plan = $plan;
    }

    public function build()
    {
        return $this->markdown('emails.adminNotification')
            ->subject('New Payment Request')
            ->with([
                'transaction' => $this->transaction,
                'user' => $this->user,
                'plan' => $this->plan,
            ]);
    }
}