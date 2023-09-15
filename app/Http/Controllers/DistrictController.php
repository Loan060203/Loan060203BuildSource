<?php

namespace App\Http\Controllers;

use App\Models\District;


use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DistrictController extends Controller
{
    use HandleErrorException;

    //
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 1);
        $currentPage = $request->input('page', 1);
        return District::paginate($perPage, ['*'], 'page', $currentPage);
    }

    public function show($id): \Illuminate\Http\JsonResponse
    {
        $districts = District::findOrFail($id);
        return response()->json($districts);
    }

    public function all(): \Illuminate\Http\JsonResponse
    {
        $districts = District::all();
        return response()->json($districts);
    }

}
