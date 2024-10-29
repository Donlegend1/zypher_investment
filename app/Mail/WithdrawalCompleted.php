<?php

namespace App\Mail;


use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Withdrawal;

class WithdrawalCompleted extends Mailable
{
    use Queueable, SerializesModels;

    public $withdrawal;

    public function __construct(Withdrawal $withdrawal)
    {
        $this->withdrawal = $withdrawal;
    }

    public function build()
    {
        return $this
            ->subject('Withdrawal Completed')
            ->view('emails.withdrawal_completed')
            ->with([
                'amount' => $this->withdrawal->amount,
                'name' => $this->withdrawal->user->full_name,
                'transaction_reference' => $this->withdrawal->reference,
                'status' => $this->withdrawal->status,
            ]);
    }
}