<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Transaction;
use App\Models\User;

class AccountFunded extends Mailable
{
    use Queueable, SerializesModels;

    public $transaction;
    public $user;

    public function __construct(Transaction $transaction, User $user)
    {
        $this->transaction = $transaction;
        $this->user = $user;
    }

    public function build()
    {
        return $this
            ->subject('Account Funded')
            ->view('emails.account_funded')
            ->with([
                'amount' => $this->transaction->amount,
                'transaction_reference' => $this->transaction->reference,
                'status' => $this->transaction->status,
                'name' => $this->user->full_name,
            ]);
    }
}