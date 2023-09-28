<?php

namespace App\Services;

use App\Http\Request\CreateCompanyBranchRequest;
use App\Http\Request\UpdateCompanyBranchRequest;
use App\Models\District;
use App\Repositories\CompanyBranch\CompanyBranchRepository;
use App\Repositories\District\DistrictRepository;

class DistrictService
{
    protected DistrictRepository $districtRepository;

    public function __construct(DistrictRepository $districtRepository)
    {
        $this->districtRepository = $districtRepository;
    }

    public function getAll(): \Illuminate\Database\Eloquent\Collection|array
    {
        return $this->districtRepository->getAll();
    }

    public function getAllInPage($perPage, $currentPage)
    {
        return $this->districtRepository->getAllInPage($perPage, $currentPage);
    }

    public function getById($id)
    {
        return $this->districtRepository->getById($id);
    }

}
