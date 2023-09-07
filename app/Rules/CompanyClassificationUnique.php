<?php

namespace App\Rules;

use App\Models\Company\Company;
use Illuminate\Contracts\Validation\Rule;

class CompanyClassificationUnique implements Rule
{

    public function passes($attribute, $value): bool
    {
        // TODO: Implement passes() method.
        $existingRecord = Company::where('classification', $value)->first();

        return !$existingRecord;
    }

    public function message(): string
    {
        // TODO: Implement message() method.
        return 'The :attribute must be unique.';
    }
}
