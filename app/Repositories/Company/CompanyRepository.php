<?php
namespace App\Repositories\Company;

use App\Enums\CompanyTypeEnum;

use App\Http\Request\CreateCompanyRequest;
use App\Http\Request\UpdateCompanyRequest;
use App\Models\Company\Company;



class CompanyRepository implements CompanyRepositoryInterface
{
    public function getAll(): array|\Illuminate\Database\Eloquent\Collection
    {
        return Company::all();
    }
    public function getAllWithBranches($perPage, $currentPage): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return Company::with('branches')->paginate($perPage, ['*'], 'page', $currentPage);
    }
    public function getById($id)
    {
        return Company::findOrFail($id);
    }
    public function create(CreateCompanyRequest $request): \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Builder
    {
        $data = $request->validated();
        return Company::query()->create($data);
    }
    public function update(UpdateCompanyRequest $request, int $id): array|null|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
    {
        $data = $request->validated();
        $company = Company::query()->findOrFail($id);
        $company->update($data);
        return $company;
    }
}
