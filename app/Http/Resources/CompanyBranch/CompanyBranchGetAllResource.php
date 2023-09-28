<?php

namespace App\Http\Resources\CompanyBranch;

use App\Models\Company\CompanyBranch;
use Illuminate\Http\Request;


/**
 * Transform the resource into an array.
 *
 * @mixin   CompanyBranch
 */
class CompanyBranchGetAllResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'use_flg' => $this->use_flg,
            'classification' => $this->classification,
            'district_id' => $this->district_id,
            'company_id' => $this->company_id,
        ];
    }
}
