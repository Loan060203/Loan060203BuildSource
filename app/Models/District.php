<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static paginate(mixed $perPage, string[] $array, string $string, mixed $currentPage)
 * @method static findOrFail($id)
 * @mixin IdeHelperDistrict
 */
class District extends Model
{
    use HasFactory;
    public  $timestamps= false;

}
