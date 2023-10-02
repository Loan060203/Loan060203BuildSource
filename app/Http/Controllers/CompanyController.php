<?php

namespace App\Http\Controllers;


use App\Http\Request\CreateCompanyRequest;
use App\Http\Request\UpdateCompanyRequest;
use App\Http\Resources\Company\CompanyCollection;
use App\Http\Resources\Company\CompanyGetAllResource;
use App\Http\Resources\Company\CompanyItemResource;
use App\Http\Resources\Company\CompanyResource;
use App\Http\Resources\CompanyBranch\CompanyBranchCollection;
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
    public function index(): \Illuminate\Http\JsonResponse
    {
        $companies = $this->companyRepository->getAllWithBranches();
        $companyCollection= new CompanyCollection($companies);

        $queries = DB::getQueryLog();

        return response()->json([
            'sql_query' => $queries,
            'company' => $companyCollection,
        ]);
    }
    public function show($id): \Illuminate\Http\JsonResponse
    {
        $company = $this->companyRepository->getById($id);
        $companyResource = new CompanyResource($company);

        $queries = DB::getQueryLog();

        return response()->json([
            'sql_query' => $queries,
            'company' => $companyResource,
        ]);
    }
    public function all(): \Illuminate\Http\JsonResponse
    {
        $companies = $this->companyRepository->getAll();
        $companyGetAllResource = CompanyGetAllResource::collection($companies);

        $queries = DB::getQueryLog();

        return response()->json([
            'sql_query' => $queries,
            'company' => $companyGetAllResource,
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
