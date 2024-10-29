<?php
// app/Http/Controllers/Auth/RegisterController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'referral_code' => ['nullable', 'string', 'max:6', 'exists:users,referral_code'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        $referralCode = User::generateReferralCode();

        // Find the referring user if a referral code is provided
        $referredBy = null;
        if (!empty($data['referral_code'])) {
            $referringUser = User::where('referral_code', $data['referral_code'])->first();
            if ($referringUser) {
                $referredBy = $referringUser->id;
            }
        }

        return User::create([
            'full_name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'referral_code' => $referralCode,
            'referred_by' => $referredBy,
        ]);
    }
}