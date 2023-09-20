<?php

namespace App\Http\Request\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

   function rules(): array
    {
        return [
            'login_id' => 'required|string|max:255|unique:users,login_id',
            'password' => 'required|string|confirmed|min:8'
        ];
    }

}
