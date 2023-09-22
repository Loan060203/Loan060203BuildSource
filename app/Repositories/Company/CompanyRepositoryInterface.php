<?php
namespace App\Repositories\Company;

use App\Http\Request\CreateCompanyRequest;
use App\Http\Request\UpdateCompanyRequest;

interface CompanyRepositoryInterface
{
    public function getAll();

    public function getAllWithBranches($perPage, $currentPage);

    public function getById($id);

    public function create(CreateCompanyRequest $request);

    public function update(UpdateCompanyRequest $request, int $id);

}
