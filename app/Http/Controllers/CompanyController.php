<?php

namespace App\Http\Controllers;


use App\Http\Request\CreateCompanyRequest;
use App\Http\Request\UpdateCompanyRequest;
use App\Http\Resources\Company\CompanyCollection;
use App\Http\Resources\Company\CompanyGetAllResource;
use App\Http\Resources\Company\CompanyItemResource;
use App\Http\Resources\Company\CompanyResource;
use App\Repositories\Company\CompanyRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


/**
 * @property $repository
 */
class CompanyController extends Controller
{
    protected CompanyRepositoryInterface $companyRepository;

    public function __construct(CompanyRepositoryInterface $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }
    public function index(Request $request): \Illuminate\Http\JsonResponse
    {
        $perPage = $request->input('per_page', 10);
        $currentPage = $request->input('page', 1);

        $companies = $this->companyRepository->getAllWithBranches($perPage, $currentPage);
        $companyResource= CompanyResource::collection($companies);

        $queries = DB::getQueryLog();

        return response()->json([
            'company' => $companyResource,
            'sql_query' => $queries,
        ]);
    }
    public function show($id): \Illuminate\Http\JsonResponse
    {
        $company = $this->companyRepository->getById($id);
        $companyResource = new CompanyResource($company);

        $queries = DB::getQueryLog();

        return response()->json([
            'company' => $companyResource,
            'sql_query' => $queries,
        ]);
    }
    public function all(): \Illuminate\Http\JsonResponse
    {
        $companies = $this->companyRepository->getAll();
        $companyGetAllResource = CompanyGetAllResource::collection($companies);

        $queries = DB::getQueryLog();

        return response()->json([
            'company' => $companyGetAllResource,
            'sql_query' => $queries,
        ]);
    }

    public function store(CreateCompanyRequest $request): \Illuminate\Http\JsonResponse
    {
        $companies = $this->companyRepository->create($request);

        $queries = DB::getQueryLog();
        return response()->json(['queries' => $queries,'data'=>$companies]);
    }
    public function update(UpdateCompanyRequest $request, int $id): \Illuminate\Http\JsonResponse
    {
        $company = $this->companyRepository->update($request, $id);

        $queries = DB::getQueryLog();
        return response()->json(['queries' => $queries,'data'=>$company]);
    }

}
