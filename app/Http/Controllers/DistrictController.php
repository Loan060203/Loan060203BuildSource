<?php

namespace App\Http\Controllers;

use App\Models\Company\CompanyBranch;
use App\Models\District;


use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DistrictController extends Controller
{
    use HandleErrorException;

    //
    public function Index(Request $request)
    {
        $perPage = $request->input('per_page', 2);
        $currentPage = $request->input('page', 1);

        $districts = District::paginate($perPage, ['*'], 'page', $currentPage);

        return $districts;


    }

    public function show($id)
    {
        $districts = District::findOrFail($id);

        return response()->json($districts);
    }

    public  function  All()
    {
        $Districts = District::all();
        return response()->json($Districts);
    }
}
