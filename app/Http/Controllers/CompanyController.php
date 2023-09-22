<?php

namespace App\Http\Controllers;


use App\Http\Request\CreateCompanyRequest;
use App\Http\Request\UpdateCompanyRequest;
use App\Models\Company\Company;
use App\Repositories\Company\CompanyRepositoryInterface;
use Doctrine\DBAL\Query;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


/**
 * @property $repository
 */
class CompanyController extends Controller
{
    protected CompanyRepositoryInterface $CompanyRepository;

    public function __construct(CompanyRepositoryInterface $CompanyRepository)
    {
        $this->CompanyRepository = $CompanyRepository;
    }
    public function index(Request $request): \Illuminate\Http\JsonResponse
    {
        $perPage = $request->input('per_page', 10);
        $currentPage = $request->input('page', 1);

        $companies = $this->CompanyRepository->getAllWithBranches($perPage, $currentPage);

        $queries = DB::getQueryLog();
        return response()->json(['queries' => $queries,'data'=>$companies]);
    }
    public function show($id): \Illuminate\Http\JsonResponse
    {
        $companies = $this->CompanyRepository->getById($id);

        $queries = DB::getQueryLog();
        return response()->json(['queries' => $queries,'data'=>$companies]);
    }
    public function all(): \Illuminate\Http\JsonResponse
    {
        $companies = $this->CompanyRepository->getAll();

        $queries = DB::getQueryLog();
        return response()->json(['queries' => $queries,'data'=>$companies]);
    }

    public function store(CreateCompanyRequest $request): \Illuminate\Http\JsonResponse
    {
        $companies = $this->CompanyRepository->create($request);

        $queries = DB::getQueryLog();
        return response()->json(['queries' => $queries,'data'=>$companies]);
    }
    public function update(UpdateCompanyRequest $request, int $id): \Illuminate\Http\JsonResponse
    {
        $company = $this->CompanyRepository->update($request, $id);

        $queries = DB::getQueryLog();
        return response()->json(['queries' => $queries,'data'=>$company]);
    }








}
