<?php
namespace App\Repositories\Company;

use App\Enums\CompanyTypeEnum;

use App\Http\Request\CreateCompanyRequest;
use App\Http\Request\UpdateCompanyRequest;
use App\Models\Company\Company;
use App\Support\Trait\HasPagination;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;


class CompanyRepository implements CompanyRepositoryInterface
{
    use HasPagination;
    public function getAll(): array|\Illuminate\Database\Eloquent\Collection
    {
        return Company::all();
    }
    public function getAllWithBranches(): LengthAwarePaginator
    {
        return Company::with('branches')->paginate($this->getPerPage());
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
