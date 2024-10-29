<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserProfileRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Update this based on your authorization logic
    }

    public function rules()
    {
        return [
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $this->id, // Allow current email
            'password' => 'nullable|string|confirmed', // Ensure password confirmation if provided
        ];
    }
}