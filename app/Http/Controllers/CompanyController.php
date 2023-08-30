<?php

namespace App\Http\Controllers;


use App\Enums\CompanyTypeEnum;
use App\Http\Request\CreateCompanyRequest;
use App\Http\Resources\Company\CompanyGetAllResource;
use App\Http\Resources\Company\CompanyResource;
use App\Models\Company\Company;
use App\Rules\Company\CompanyClassificationUnique;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;


class CompanyController extends Controller
{
    //

    //use HasPagination;

    private $repository;

    public function index(Request $request)
    {
//       $company = Company::all();
//
//       return response()->json($company);

        $perPage = $request->input('per_page', 2);
        $currentPage = $request->input('page', 1);

        $company = company::paginate($perPage, ['*'], 'page', $currentPage);

        return $company;




//        $companies = $this->repository->findByFilters();
//
//        return $this->httpOk(new CompanyCollection($companies));


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

    public  function  store(CreateCompanyRequest $request)
    {

        //$company = new company();
        $company = Company::create([
       'classification' =>$request->input('classification'),
        'code' => $request->input('code'),
        'name' => $request->input('name'),
         'yomigana' => $request->input('yomigana'),
         'post' => $request->input('post'),
        'address' => $request->input('address'),
        'tel1' => $request->input('tel1'),
        'tel2' => $request->input('tel2'),
        'fax' => $request->input('fax'),
        'contact_name' => $request->input('contact_name'),
        'url' => $request->input('url'),
        'dsp_ord_num' => $request->input('dsp_ord_num'),
        'remark' => $request->input('remark'),
        'idv_mgmt' => $request->input('idv_mgmt'),
        'use_flg' => $request->input('use_flg'),
        ]);
        return response()->json($company);

    }






}
