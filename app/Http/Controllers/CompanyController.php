<?php

namespace App\Http\Controllers;


use App\Enums\CompanyTypeEnum;
use App\Http\Request\CreateCompanyRequest;
use App\Http\Resources\Company\CompanyGetAllResource;
use App\Http\Resources\Company\CompanyResource;
use App\Models\Company\Company;
use App\Models\Company\CompanyBranch;
use App\Rules\Company\CompanyClassificationUnique;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;


class CompanyController extends Controller
{
    //

    //use HasPagination;

    private $repository;

    public function index(Request $request): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        $perPage = $request->input('per_page', 1);
        $currentPage = $request->input('page', 1);
        $companies = Company::with('branches')->paginate($perPage, ['*'], 'page', $currentPage);
        return $companies;
    }


    public function show($id): JsonResponse
    {
        $companies = Company::findOrFail($id);
        return response()->json($companies);
    }
    public function all(): JsonResponse
    {
        $companies = Company::all();
        return response()->json($companies);
    }








}
