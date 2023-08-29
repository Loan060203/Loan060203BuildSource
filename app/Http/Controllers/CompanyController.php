<?php

namespace App\Http\Controllers;


use App\Models\Company\Company;


class CompanyController extends Controller
{
    //





    public function index()
    {
       $company = Company::all();

        return response()->json($company);
//        $companies = $this->repository->findByFilters();
//
//        return $this->httpOk(new CompanyCollection($companies));


    }





}
