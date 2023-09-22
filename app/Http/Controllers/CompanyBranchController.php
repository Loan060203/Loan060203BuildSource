<?php

namespace App\Http\Controllers;

use App\Http\Request\CreateCompanyBranchRequest;
use App\Http\Request\UpdateCompanyBranchRequest;
use App\Models\Company\CompanyBranch;
use App\Repositories\Company\CompanyRepositoryInterface;
use App\Repositories\CompanyBranch\CompanyBranchRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CompanyBranchController extends Controller
{
    protected CompanyBranchRepositoryInterface $CompanyBranchRepository;

    public function __construct(CompanyBranchRepositoryInterface $CompanyBranchRepository)
    {
        $this->CompanyBranchRepository = $CompanyBranchRepository;
    }
    public function index(Request $request): \Illuminate\Http\JsonResponse
    {
        $perPage = $request->input('per_page', 10);
        $currentPage = $request->input('page', 1);

        $branches = $this->CompanyBranchRepository->getAllBranches($perPage, $currentPage);

        $queries = DB::getQueryLog();
        return response()->json(['queries' => $queries,'data'=>$branches]);

    }
    public function show($id): \Illuminate\Http\JsonResponse
    {
        $branches = $this->CompanyBranchRepository->getById($id);

        $queries = DB::getQueryLog();
        return response()->json(['queries' => $queries,'data'=>$branches]);
    }

    public  function  all(): \Illuminate\Http\JsonResponse
    {
        $branches = $this->CompanyBranchRepository->getAll();

        $queries = DB::getQueryLog();
        return response()->json(['queries' => $queries,'data'=>$branches]);
    }

    public function store(CreateCompanyBranchRequest $request): \Illuminate\Http\JsonResponse
    {
        $branches = $this->CompanyBranchRepository->create($request);

        $queries = DB::getQueryLog();
        return response()->json(['queries' => $queries,'data'=>$branches]);
    }

    public function update(UpdateCompanyBranchRequest $request, int $id): \Illuminate\Http\JsonResponse
    {
        $branches = $this->CompanyBranchRepository->update($request, $id);

        $queries = DB::getQueryLog();
        return response()->json(['queries' => $queries,'data'=>$branches]);
    }

}
