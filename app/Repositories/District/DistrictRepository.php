<?php
namespace App\Repositories\District;



use App\Models\Company\CompanyBranch;
use App\Models\District;

class DistrictRepository implements DistrictRepositoryInterface
{
    public function getAll()
    {
        return District::all();
    }

    public function getAllInPage($perPage, $currentPage)
    {
        return District::paginate($perPage, ['*'], 'page', $currentPage);
    }

    public function getById($id)
    {
        return District::findOrFail($id);

    }
}
