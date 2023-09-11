<?php

namespace App\Http\Controllers;

//use App\Http\Resources\CompanyBranch\CompanyBranchCollection;
//use App\Repositories\CompanyBranchRepository;
use App\Models\Company\CompanyBranch;

//use Illuminate\Http\Request;

class CompanyBranchController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 1);
        $currentPage = $request->input('page', 1);
        $branches = CompanyBranch::paginate($perPage, ['*'], 'page', $currentPage);
        return $branches;

//        $branches = CompanyBranch::all();
//        return response()->json($branches);
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
    public function store(): void
    {
        $branches= new CompanyBranch;

        $branches->classification='4';
        $branches->company_id='6';
        $branches->code='0012';
        $branches->name='groupsg';
        $branches->yomigana='sai gon';
        $branches->dsp_ord_num='1';
        $branches->idv_mgmt='1';
        $branches->use_flg='1';
        $branches->created_by='999';
        $branches->updated_by='15';
        $branches->created_at='2023-09-06 03:29:23';
        $branches->updated_at='2023-09-06 03:29:23';

        $branches->save();
    }
    public function update(): \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $branches= CompanyBranch::find(4);

        $branches->classification='4';
        $branches->company_id='6';
        $branches->code='0012';
        $branches->name='batdongsan';
        $branches->yomigana='bat dong san sai gon';
        $branches->dsp_ord_num='1';
        $branches->idv_mgmt='1';
        $branches->use_flg='1';
        $branches->created_by='999';
        $branches->updated_by='15';
        $branches->created_at='2023-09-06 03:29:23';
        $branches->updated_at='2023-09-06 03:29:23';

        $branches->save();
        return redirect('/company');

    }

}
