<?php

namespace App\Http\Controllers;

//use App\Http\Resources\CompanyBranch\CompanyBranchCollection;
//use App\Repositories\CompanyBranchRepository;
use App\Models\Company\Company;
use App\Models\Company\CompanyBranch;
use Illuminate\Http\Request;

//use Illuminate\Http\Request;

class CompanyBranchController extends Controller
{
    //



    public function index(Request $request)
    {

        $perPage = $request->input('per_page', 1);
        $currentPage = $request->input('page', 1);

        $branches = CompanyBranch::paginate($perPage, ['*'], 'page', $currentPage);

        return $branches;

//        $branches = CompanyBranch::all();
//        return response()->json($branches);
    }
    public function show($id)
    {
        $branches = CompanyBranch::findOrFail($id);

        return response()->json($branches);
    }

    public  function  All()
    {
        $CompanyBranches = CompanyBranch::all();
        return response()->json($CompanyBranches);
    }

}
