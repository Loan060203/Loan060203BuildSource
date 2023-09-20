<?php

namespace App\Http\Controllers;

use App\Http\Request\CreateCompanyBranchRequest;
use App\Http\Request\UpdateCompanyBranchRequest;
use App\Models\Company\CompanyBranch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CompanyBranchController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 1);
        $currentPage = $request->input('page', 1);
        $branches = CompanyBranch::paginate($perPage, ['*'], 'page', $currentPage);

        $queries = DB::getQueryLog();
        return response()->json(['queries' => $queries,'data'=>$branches]);

    }
    public function show($id): \Illuminate\Http\JsonResponse
    {
        $branches = CompanyBranch::findOrFail($id);

        $queries = DB::getQueryLog();
        return response()->json(['queries' => $queries,'data'=>$branches]);
    }

    public  function  all(): \Illuminate\Http\JsonResponse
    {
        $branches = CompanyBranch::all();

        $queries = DB::getQueryLog();
        return response()->json(['queries' => $queries,'data'=>$branches]);
    }

    public function store(CreateCompanyBranchRequest $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->validated();
        $branches = CompanyBranch::create($data);

        $queries = DB::getQueryLog();
        return response()->json(['queries' => $queries,'data'=>$branches]);
    }

    public function update(UpdateCompanyBranchRequest $request, int $id): \Illuminate\Http\JsonResponse
    {
        $data = $request->validated();
        $branches = CompanyBranch::findOrFail($id);
        $branches->update($data);

        $queries = DB::getQueryLog();
        return response()->json(['queries' => $queries,'data'=>$branches]);
    }

}
