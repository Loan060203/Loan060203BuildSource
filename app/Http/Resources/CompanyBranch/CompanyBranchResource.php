<?php

namespace App\Http\Resources\CompanyBranch;

use App\Enums\CommonEnum;
use App\Http\Resources\Company\RelationCompanyResource;
use App\Models\Company\CompanyBranch;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

/**
 * Transform the resource into an array.
 *
 * @mixin   CompanyBranch
 */
class CompanyBranchResource extends JsonResource
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
            'company_id' => $this->company_id,
//            'company' => $this->whenLoaded('company', function () {
//                return new RelationCompanyResource($this->company);
//            }, null),
            'code' => $this->code,
            'name' => $this->name,
            'classification' => $this->classification,
            'district_id' => $this->district_id,
            'remark' => $this->remark,
            'use_flg' => $this->use_flg,
            'post' => $this->post,
            'address' => $this->address,
            'tel1' => $this->tel1,

        ];
    }
}
