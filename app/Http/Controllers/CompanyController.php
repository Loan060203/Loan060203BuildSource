<?php

namespace App\Http\Controllers;


use App\Http\Request\CreateCompanyRequest;
use App\Http\Request\UpdateCompanyRequest;
use App\Models\Company\Company;
use App\Repositories\Company\CompanyRepository;
use Doctrine\DBAL\Query;
use Illuminate\Http\Request;


/**
 * @property $repository
 */
class CompanyController extends Controller
{
    public function index(Request $request): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        $perPage = $request->input('per_page', 1);
        $currentPage = $request->input('page', 1);
        return Company::with('branches')->paginate($perPage, ['*'], 'page', $currentPage);
    }
    public function show($id): \Illuminate\Http\JsonResponse
    {
        $companies = Company::findOrFail($id);
        return response()->json($companies);
    }
    public function all(): \Illuminate\Http\JsonResponse
    {
        $companies = Company::all();
        return response()->json($companies);
    }

    public function store(CreateCompanyRequest $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->validated();
        $company = Company::create($data);
        return response()->json($company);
    }
    public function update(UpdateCompanyRequest $request, int $id): \Illuminate\Http\JsonResponse
    {
        $data = $request->validated();
        $company = Company::findOrFail($id);
        $company->update($data);
        return  response()->json($company);
    }








}
