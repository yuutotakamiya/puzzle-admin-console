<?php

namespace App\Http\Controllers;

use App\Http\Resources\LandResource;
use App\Models\Land;

class LandController extends Controller
{
    //島のマスタ情報
    public function index()
    {
        $land = Land::all();

        return response()->json([LandResource::collection($land)]);
    }
}
