<?php

namespace App\Http\Controllers;


use App\Http\Resources\Company\CompanyGetAllResource;
use App\Http\Resources\Company\CompanyResource;
use App\Models\Company\Company;
use http\Env\Response;
use Illuminate\Http\Request;


class CompanyController extends Controller
{
    //


    private $repository;

    public function index(Request $request)
    {

        $perPage = $request->input('per_page', 2);
        $currentPage = $request->input('page', 1);

        $company = company::paginate($perPage, ['*'], 'page', $currentPage);

        return $company;




    }

    public function show($id)
    {
        $company = Company::findOrFail($id);

        return response()->json($company);
    }
    public function all()
    {
        $companies = Company::all();

        return response()->json($companies);
    }







}
