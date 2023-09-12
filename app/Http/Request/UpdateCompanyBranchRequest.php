<?php

namespace App\Http\Request;

use App\Enums\CompanyBranchTypeEnum;
use App\Models\Company\CompanyBranch;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCompanyBranchRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'classification' => [Rule::in(CompanyBranchTypeEnum::getValues())],
            'company_id' => 'required|numeric|exists:company,id',
            'code' => ['max:50', 'string', 'required', Rule::unique('company_branches')->ignore($this->CompanyBranch->id, 'id')],
            'name' => 'max:100|string',
            'yomigana' => 'string|nullable',
            'std_payment' => 'string|nullable',
            'tax_classify' => 'max:100|string|nullable',
            'dsp_ord_num' => 'numeric',
            'remark' => 'string|nullable',
            'idv_mgmt' => 'boolean',
            'use_flg' => 'boolean',
            'post' => 'max:8',
            'address' => 'max:100',
            'tel1' => 'max:13',
            'tel2' => 'max:13',
            'fax' => 'max:13',
            'contact_name' => 'max:50',
            'url' => 'max:100',
            //
        ];
    }
}
