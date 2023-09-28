<?php
namespace App\Services;


use App\Http\Request\CreateCompanyRequest;
use App\Http\Request\UpdateCompanyRequest;
use App\Repositories\Company\CompanyRepository;

class CompanyService
{
    protected CompanyRepository $companyRepository;

    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function getAll(): \Illuminate\Database\Eloquent\Collection|array
    {
        return $this->companyRepository->getAll();
    }
    public function getAllWithBranches($perPage, $currentPage): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return $this->companyRepository->getAllWithBranches($perPage, $currentPage);
    }

    public function getById($id)
    {
        return $this->companyRepository->getById($id);
    }

    public function create(CreateCompanyRequest $request): \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Builder
    {
        return $this->companyRepository->create( $request);
    }

    public function update(UpdateCompanyRequest $request, int $id)
    {
        return $this->companyRepository->update( $request, $id);
    }
}
