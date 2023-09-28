<?php

namespace App\Services;

use App\Http\Request\CreateCompanyBranchRequest;
use App\Http\Request\CreateCompanyRequest;
use App\Http\Request\UpdateCompanyBranchRequest;
use App\Http\Request\UpdateCompanyRequest;
use App\Repositories\Company\CompanyRepository;
use App\Repositories\CompanyBranch\CompanyBranchRepository;

class CompanyBranchService
{
    protected CompanyBranchRepository $companyBranchRepository;

    public function __construct(companyBranchRepository $companyBranchRepository)
    {
        $this->companyBranchRepository = $companyBranchRepository;
    }

    public function getAll(): \Illuminate\Database\Eloquent\Collection|array
    {
        return $this->companyBranchRepository->getAll();
    }

    public function getAllBranches($perPage, $currentPage)
    {
        return $this->companyBranchRepository->getAllBranches($perPage, $currentPage);
    }

    public function getById($id)
    {
        return $this->companyBranchRepository->getById($id);
    }

    public function create(CreateCompanyBranchRequest $request): \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Builder
    {
        return $this->companyBranchRepository->create( $request);
    }

    public function update(UpdateCompanyBranchRequest $request, int $id)
    {
        return $this->companyBranchRepository->update( $request, $id);
    }

}
