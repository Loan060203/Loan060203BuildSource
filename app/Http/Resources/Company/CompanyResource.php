<?php

namespace App\Http\Resources\Company;

use App\Enums\CommonEnum;
use App\Http\Resources\Arrayable;
use App\Http\Resources\CompanyBranch\CompanyBranchItemResource;
use App\Models\Company\Company;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Transform the resource into an array.
 *
 * @mixin   Company
 */
class CompanyResource extends JsonResource
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
            'id'=> $this->id,
            'classification' => $this->classification,
            'code' => $this->code,
            'name' => $this->name,
            'post' => $this->post,
            'address' => $this->address,
            'tel1' => $this->tel1,
            'use_flg' => $this->use_flg,
            'branches' => $this->whenLoaded('branches', function () {
                return CompanyBranchItemResource::collection($this->branches);
            }, null),
        ];
    }
}
