<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;


    protected $table='company';
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
        'remask',
        'idv_mgmt',
        'use_flg'
    ];



    public function branches(): HasMany
    {
        return $this->hasMany(CompanyBranch::class);
    }




}
