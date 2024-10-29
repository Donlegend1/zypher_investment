<?php

namespace App\Http\Controllers;

use App\Models\Email;
use App\Models\EmailRecipient;
use App\Models\User;
use App\Http\Requests\StoreEmailRequest;
use App\Http\Requests\UpdateEmailRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserNotification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;


class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        
        $mails  = EmailRecipient::with('email')->get();
        // dd($mails);
       
        return view('dashboard.admin.mails.mails', compact('mails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('is_admin', 0)->get();
        return view('dashboard.admin.mails.sendmail', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmailRequest $request)
    {
        $request->validate([
            'recipients' => 'required|array',
            'recipients.*' => 'email',
            // 'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        $recipients = $request->input('recipients');
        $subject = $request->input('subject');
        $messageContent = $request->input('message');

        Log::info('Recipients:', $recipients);
        Log::info('Subject:', ['subject' => $subject]);
        Log::info('Message Content:', ['message' => $messageContent]);

        DB::beginTransaction();

        try {
            // Save the email to the database
            $email = Email::create([
                'subject' => $subject,
                'message' => $messageContent,
            ]);

            Log::info('Email created with ID:', ['id' => $email->id]);

            // Save each recipient to the database
            foreach ($recipients as $recipient) {
                EmailRecipient::create([
                    'email_id' => $email->id,
                    'recipient_email' => $recipient,
                ]);

                Log::info('Recipient saved:', ['recipient_email' => $recipient]);
            }

            // Send email to each recipient
            foreach ($recipients as $recipient) {
                try {
                    Mail::to($recipient)->send(new UserNotification($subject, $messageContent));
                    Log::info('Email sent to recipient:', ['recipient_email' => $recipient]);
                } catch (\Exception $mailException) {
                    Log::error('Failed to send email to recipient:', [
                        'recipient_email' => $recipient,
                        'error' => $mailException->getMessage(),
                    ]);
                }
            }

            DB::commit();
            return redirect()->back()->with(['message' => 'Emails sent and saved to the database successfully!'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Failed to send emails:', ['error' => $e->getMessage()]);
            return redirect()->back()->with(['message' => 'Failed to send emails: ' . $e->getMessage()], 500);
        }
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function show(Email $email)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function edit(Email $email)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmailRequest  $request
     * @param  \App\Models\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmailRequest $request, Email $email)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function destroy(Email $email)
    {
        //
    }
}