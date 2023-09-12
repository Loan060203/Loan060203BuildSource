<?php

namespace App\Http\Controllers;

//use App\Http\Resources\CompanyBranch\CompanyBranchCollection;
//use App\Repositories\CompanyBranchRepository;
use App\Http\Request\CreateCompanyBranchRequest;
use App\Http\Request\CreateCompanyRequest;
use App\Http\Request\UpdateCompanyBranchRequest;
use App\Http\Request\UpdateCompanyRequest;
use App\Models\Company\Company;
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

    public function store(CreateCompanyBranchRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validated();
        $branches = new company_branches;

        $branches->classification = $data['classification'];
        $branches->company_id=$data['company_id'];
        $branches ->code = $data['code'];
        $branches ->name = $data['name'];
        $branches ->yomigana = $data['yomigana'];
        $branches ->std_payment = $data['std_payment'];
        $branches ->tax_classify = $data['tax_classify'];
        $branches ->dsp_ord_num = $data['dsp_ord_num'];
        $branches ->remark = $data['remark'];
        $branches ->idv_mgmt = $data['idv_mgmt'];
        $branches ->use_flg = $data['use_flg'];
        $branches ->created_by = $data['created_by'];
        $branches ->updated_by =$data['updated_by'];

        $branches ->save();

        return redirect()->route('company_branches.index')->with('success', 'Company created successfully');
    }

    public function update(UpdateCompanyBranchRequest $request,CompanyBranch $branches, $id): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validated();
        $branches = CompanyBranch::findOrFail($id);
        $branches->update($data);

        $branches->classification = $data['classification'];
        $branches->company_id=$data['company_id'];
        $branches ->code = $data['code'];
        $branches ->name = $data['name'];
        $branches ->yomigana = $data['yomigana'];
        $branches ->std_payment = $data['std_payment'];
        $branches ->tax_classify = $data['tax_classify'];
        $branches ->dsp_ord_num = $data['dsp_ord_num'];
        $branches ->remark = $data['remark'];
        $branches ->idv_mgmt = $data['idv_mgmt'];
        $branches ->use_flg = $data['use_flg'];
        $branches ->created_by = $data['created_by'];
        $branches ->updated_by =$data['updated_by'];

        $branches ->save();

        return redirect()->route('company_branches.update')->with('success', 'Company created successfully');
    }

}
