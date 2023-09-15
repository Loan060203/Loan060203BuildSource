<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static findOrFail(int $id)
 * @method static create(array $data)
 * @method static seeder()
 * @mixin IdeHelperCompany
 */
class Company extends Model
{
    use HasFactory;

    public mixed $idv_mgmt;
    protected $table='companies';
    protected  $fillable=[
        'classification',
        'code',
        'name',
        'yomigana',
        'post',
        'address',
        'tel1',
        'tel2',
        'fax',
        'contact_name',
        'url',
        'dsp_ord_num',
        'remark',
        'idv_mgmt',
        'use_flg',
        'created_by',
        'updated_by'
    ];

    public function branches(): HasMany
    {
        return $this->hasMany(CompanyBranch::class);
    }




}
