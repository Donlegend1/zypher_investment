<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Withdrawal;
use App\Models\User;

class AmountDeducted extends Mailable
{
    use Queueable, SerializesModels;

    public $withdrawal;
    public $user;

    public function __construct(Withdrawal $withdrawal, User $user)
    {
        $this->withdrawal = $withdrawal;
        $this->user = $user;
    }

    public function build()
    {
        return $this
            ->subject('Amount Deducted')
            ->view('emails.amount_deducted')
            ->with([
                'amount' => $this->withdrawal->amount,
                'transaction_reference' => $this->withdrawal->id,
                'status' => $this->withdrawal->status,
                'user' => $this->user->full_name,
            ]);
    }
}