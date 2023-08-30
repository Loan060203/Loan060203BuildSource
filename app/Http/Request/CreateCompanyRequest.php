<?php

namespace App\Http\Request;

use App\Enums\CompanyTypeEnum;
use App\Rules\Company\CompanyClassificationUnique;
use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateCompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'classification' => [Rule::in(CompanyTypeEnum::getValues()), new CompanyClassificationUnique],
            'code' => ['max:50', 'string', 'required', Rule::unique('companies')],
            'name' => 'max:100|string',
            'yomigana' => 'string|nullable',
            'post' => 'max:8',
            'address' => 'max:100',
            'tel1' => 'max:13',
            'tel2' => 'max:13',
            'fax' => 'max:13',
            'contact_name' => 'max:50',
            'url' => 'max:100',
            'dsp_ord_num' => 'numeric',
            'remark' => 'string|nullable',
            'idv_mgmt' => 'boolean',
            'use_flg' => 'boolean'
            //
        ];
    }
}