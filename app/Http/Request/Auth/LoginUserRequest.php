<?php

namespace App\Http\Request\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'login_id' => 'required|string|max:255',
            'password' => 'required|string',
        ];
    }
}
