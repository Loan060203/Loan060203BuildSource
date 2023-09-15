<?php

namespace App\Http\Controllers;

use App\Http\Request\CreateCompanyBranchRequest;
use App\Http\Request\UpdateCompanyBranchRequest;
use App\Models\Company\CompanyBranch;
use Illuminate\Http\Request;


class CompanyBranchController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 1);
        $currentPage = $request->input('page', 1);
        return CompanyBranch::paginate($perPage, ['*'], 'page', $currentPage);
    }
    public function show($id): \Illuminate\Http\JsonResponse
    {
        $branches = CompanyBranch::findOrFail($id);
        return response()->json($branches);
    }

    public  function  all(): \Illuminate\Http\JsonResponse
    {
        $branches = CompanyBranch::all();
        return response()->json($branches);
    }

    public function store(CreateCompanyBranchRequest $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->validated();
        $branches = CompanyBranch::create($data);
        return response()->json($branches);
    }

    public function update(UpdateCompanyBranchRequest $request, int $id): \Illuminate\Http\JsonResponse
    {
        $data = $request->validated();
        $branch = CompanyBranch::findOrFail($id);
        $branch->update($data);
        return response()->json($branch);
    }

}
