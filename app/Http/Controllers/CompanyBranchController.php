<?php

namespace App\Http\Controllers;

//use App\Http\Resources\CompanyBranch\CompanyBranchCollection;
//use App\Repositories\CompanyBranchRepository;
use App\Models\Company\CompanyBranch;
use Illuminate\Http\Request;

//use Illuminate\Http\Request;

class CompanyBranchController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 1);
        $currentPage = $request->input('page', 1);
        $branches = CompanyBranch::paginate($perPage, ['*'], 'page', $currentPage);
        return $branches;
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


}
