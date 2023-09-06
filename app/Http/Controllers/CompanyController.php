<?php

namespace App\Http\Controllers;


use App\Enums\CompanyTypeEnum;
use App\Http\Request\CreateCompanyRequest;
use App\Http\Resources\Company\CompanyGetAllResource;
use App\Http\Resources\Company\CompanyResource;
use App\Models\Company\Company;
use App\Models\Company\CompanyBranch;
use App\Rules\Company\CompanyClassificationUnique;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;


class CompanyController extends Controller
{
    //

    //use HasPagination;

    private $repository;

    public function index(Request $request): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        $perPage = $request->input('per_page', 1);
        $currentPage = $request->input('page', 1);
        $companies = Company::with('branches')->paginate($perPage, ['*'], 'page', $currentPage);
        return $companies;
    }


    public function show($id): JsonResponse
    {
        $companies = Company::findOrFail($id);
        return response()->json($companies);
    }
    public function all(): JsonResponse
    {
        $companies = Company::all();
        return response()->json($companies);
    }


    public function store(): void
    {
        $companies  = new company;
        $companies ->classification = '6';
        $companies ->code = '00006';
        $companies ->name = 'biasg';
        $companies ->yomigana = 'sai gon ';
        $companies ->post = '541';
        $companies ->address= 'tphcm';
        $companies ->tel1 = '2365417743';
        $companies ->fax = '154326';
        $companies ->url ='http:/fffff';
        $companies ->created_by = '999';
        $companies ->updated_by ='15';
        $companies ->updated_at = '2023-09-06 03:29:23';
        $companies ->created_at = '2023-09-06 03:29:23';
        $companies ->save();
    }
    public function update(): \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $companies  = Company::find (6);

        $companies ->classification = '4';
        $companies ->code = '00004';
        $companies ->name = 'sgroup';
        $companies ->yomigana = 'sai gon ';
        $companies ->post = '511';
        $companies ->address= 'dong nai';
        $companies ->tel1 = '0513648792';
        $companies ->fax = '6532491';
        $companies ->url ='http:/ggggg';
        $companies ->created_by = '999';
        $companies ->updated_by ='15';
        $companies ->updated_at = '2023-09-06 03:29:23';
        $companies ->created_at = '2023-09-06 03:29:23';

        $companies ->save();

        return redirect('/company');
    }







}
