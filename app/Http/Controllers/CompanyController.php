<?php

namespace App\Http\Controllers;


use App\Http\Request\CreateCompanyRequest;
use App\Models\Company\Company;
use http\Client\Response;
use Illuminate\Http\Request;


class CompanyController extends Controller
{

    public function index(Request $request): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        $perPage = $request->input('per_page', 1);
        $currentPage = $request->input('page', 1);
        return Company::with('branches')->paginate($perPage, ['*'], 'page', $currentPage);
    }
    public function show($id): \Illuminate\Http\JsonResponse
    {
        $companies = Company::findOrFail($id);
        return response()->json($companies);
    }
    public function all(): \Illuminate\Http\JsonResponse
    {
        $companies = Company::all();
        return response()->json($companies);
    }

    public function store(CreateCompanyRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validated();
        $companies  = new company;

        $companies->classification = $data['classification'];
        $companies ->code = $data['code'];
        $companies ->name = $data['name '];
        $companies ->yomigana = $data['yomigana'];
        $companies ->post = $data['post'];
        $companies ->address= $data['address'];
        $companies ->tel1 = $data['tel1'];
        $companies ->fax = $data['fax'];
        $companies ->url =$data['url'];
        $companies ->created_by = $data['created_by'];
        $companies ->updated_by =$data['updated_by'];

        $companies ->save();

        return redirect()->route('companies.index')->with('success', 'Company created successfully');
    }






}
