<?php

namespace App\Models\Company;

use App\Models\District;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static findOrFail($id)
 * @method static create(array $data)
 * @method static paginate(mixed $perPage, string[] $array, string $string, mixed $currentPage)
 * @mixin IdeHelperCompanyBranch
 */
class CompanyBranch extends Model
{
    use HasFactory;
    protected $table='company_branches';
    protected  $fillable=[
        'classification',
        'company_id',
        'district_id',
        'code',
        'name',
        'yomigana',
        'std_payment',
        'tax_classify',
        'dsp_ord_num',
        'remask',
        'idv_mgmt',
        'use_flg',
        'post',
        'address',
        'tel1',
        'tel2',
        'fax',
        'contact_name',
        'url',
        'created_by',
        'updated_by'


    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }
}
