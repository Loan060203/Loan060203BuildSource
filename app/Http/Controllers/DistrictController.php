<?php

namespace App\Http\Controllers;

use App\Models\District;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class DistrictController extends Controller
{
    use HandleErrorException;

    //
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 1);
        $currentPage = $request->input('page', 1);
        $districts= District::paginate($perPage, ['*'], 'page', $currentPage);

        $queries = DB::getQueryLog();
        return response()->json(['queries' => $queries,'data'=>$districts]);
    }

    public function show($id): \Illuminate\Http\JsonResponse
    {
        $districts = District::findOrFail($id);

        $queries = DB::getQueryLog();
        return response()->json(['queries' => $queries,'data'=>$districts]);
    }

    public function all(): \Illuminate\Http\JsonResponse
    {
        $districts = District::all();

        $queries = DB::getQueryLog();
        return response()->json(['queries' => $queries,'data'=>$districts]);
    }

}
