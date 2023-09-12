<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Http\FormRequest;

class CreateCompanyBranchesRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function validated()
    {
    }
}
