<!-- resources/views/emails/adminNotification.blade.php -->
@component('mail::message')
	# New Payment Request

	User **{{ $user->full_name }}** ({{ $user->email }}) has requested to make a payment.

	**Details:**
	- **Amount:** ${{ $transaction->amount }}
	- **Plan:** {{ $plan->name }}
	- **Wallet Address:** {{ $transaction->wallet_address }}
	- **Date:** {{ $transaction->date }}

	Please log in to review and process the request.

	Thanks,<br>
	{{ config('app.name') }}
@endcomponent
