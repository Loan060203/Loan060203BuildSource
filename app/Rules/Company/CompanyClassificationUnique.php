<?php

namespace App\Rules\Company;

use App\Enums\CompanyTypeEnum;
use App\Models\Company\Company;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\Rule;

class CompanyClassificationUnique implements Rule
{
    protected $data;

    public function setData(array $data): static
    {
        $this->data = $data;
        return $this;
    }
    public function passes($attribute, $value): \Illuminate\Http\JsonResponse
    {
        $query = Company::query()
            ->where('classification', $this->data['classification'])
            ->where('classification', '<>', CompanyTypeEnum::OTHER);

        if (!empty($this->data['id'])) {
            $query->where('id', '<>', $this->data['id']);
        }

        $uniqueClassificationCount = $query->count('id');

        return $uniqueClassificationCount == 0
            ? response()->json(true)
            : response()->json(false);
    }

    public function message(): string
    {
        $companyType = CompanyTypeEnum::getKey($this->data['classification']);
        $companyTypeJa = trans("enum.{$companyType}");
        return "{$companyTypeJa}công ty đã tồn tại";
    }


}
