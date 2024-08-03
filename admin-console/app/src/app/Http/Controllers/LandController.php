<?php

namespace App\Http\Controllers;

use App\Models\Land;

class LandController extends Controller
{
    //島のマスタ情報をviewに渡す
    public function index()
    {
        $land = Land::all();

        return view('land.land', ['land' => $land]);
    }
}
