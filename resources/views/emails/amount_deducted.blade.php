<!DOCTYPE html>
<html>
<head>
    <title>Amount Deducted</title>
</head>
<body>
    <h1>Amount Deducted</h1>
    <p>Dear {{ $user->full_name }},</p>
    <p>An amount has been deducted from your account successfully.</p>
    {{-- <p>Transaction Reference: {{ $transaction_reference }}</p> --}}
    <p>Amount:$ {{ $amount }}</p>
    <p>Status: {{ $status }}</p>
</body>
</html>
