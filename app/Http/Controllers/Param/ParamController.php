<?php

namespace App\Http\Controllers\Param;

use App\CurrentTemperature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Proximity;

class ParamController extends Controller
{
    public function store(Request $request)
    {

        Proximity::create([
            'distance' => $request->distance,
        ]);

        if (Proximity::get()->count() >= 101) {
            Proximity::first()->delete();
        }

        return response()->json([
            'distance' => $request->distance
        ]);
    }
}
