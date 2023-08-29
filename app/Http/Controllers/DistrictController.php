<?php

namespace App\Http\Controllers;

use App\Models\District;


use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DistrictController extends Controller
{
    use HandleErrorException;

    //
    public function Index()
    {
        $districts = District::all();
        return response()->json($districts);
    }




}
