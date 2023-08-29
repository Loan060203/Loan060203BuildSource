<?php

namespace App\Http\Controllers;

//use App\Http\Resources\CompanyBranch\CompanyBranchCollection;
//use App\Repositories\CompanyBranchRepository;
use App\Models\Company\CompanyBranch;

//use Illuminate\Http\Request;

class CompanyBranchController extends Controller
{
    //



    public function index()
    {
        $branches = CompanyBranch::all();
        return response()->json($branches);
    }

}
