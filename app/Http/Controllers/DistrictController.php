<?php

namespace App\Http\Controllers;

use App\Models\District;


use App\Repositories\CompanyBranch\CompanyBranchRepositoryInterface;
use App\Repositories\District\DistrictRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class DistrictController extends Controller
{
    use HandleErrorException;

    protected DistrictRepositoryInterface $DistrictRepository;

    public function __construct(DistrictRepositoryInterface $DistrictRepository)
    {
        $this->DistrictRepository = $DistrictRepository;
    }
    //
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 5);
        $currentPage = $request->input('page', 1);

        $districts= $this->DistrictRepository->getAllInPage($perPage, $currentPage);

        $queries = DB::getQueryLog();
        return response()->json(['queries' => $queries,'data'=>$districts]);
    }

    public function show($id): \Illuminate\Http\JsonResponse
    {
        $districts = $this->DistrictRepository->getById($id);

        $queries = DB::getQueryLog();
        return response()->json(['queries' => $queries,'data'=>$districts]);
    }

    public function all(): \Illuminate\Http\JsonResponse
    {
        $districts = $this->DistrictRepository->getall();

        $queries = DB::getQueryLog();
        return response()->json(['queries' => $queries,'data'=>$districts]);
    }

}
