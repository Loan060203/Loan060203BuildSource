<?php

namespace App\Http\Controllers;


use App\Http\Request\CreateCompanyRequest;
use App\Http\Request\UpdateCompanyRequest;
use App\Models\Company\Company;
use App\Repositories\Company\CompanyRepository;
use Doctrine\DBAL\Query;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


/**
 * @property $repository
 */
class CompanyController extends Controller
{
    public function index(Request $request): \Illuminate\Http\JsonResponse
    {
        $perPage = $request->input('per_page', 10);
        $currentPage = $request->input('page', 1);
        $companies = Company::with('branches')->paginate($perPage, ['*'], 'page', $currentPage);
        //return response()->json($companies);

        $queries = DB::getQueryLog();
        return response()->json(['queries' => $queries,'data'=>$companies]);
    }
    public function show($id): \Illuminate\Http\JsonResponse
    {
        $companies = Company::findOrFail($id);

        $queries = DB::getQueryLog();
        return response()->json(['queries' => $queries,'data'=>$companies]);
    }
    public function all(): \Illuminate\Http\JsonResponse
    {
        $companies = Company::all();

        $queries = DB::getQueryLog();
        return response()->json(['queries' => $queries,'data'=>$companies]);
    }

    public function store(CreateCompanyRequest $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->validated();
        $company = Company::query()->create($data);

        $queries = DB::getQueryLog();
        return response()->json(['queries' => $queries,'data'=>$company]);
    }
    public function update(UpdateCompanyRequest $request, int $id): \Illuminate\Http\JsonResponse
    {
        $data = $request->validated();
        $company = Company::query()->findOrFail($id);
        $company->update($data);

        $queries = DB::getQueryLog();
        return response()->json(['queries' => $queries,'data'=>$company]);
    }








}
