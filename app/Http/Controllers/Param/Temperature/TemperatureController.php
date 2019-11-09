<?php

namespace App\Http\Controllers\Param\Temperature;

use App\CurrentTemperature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TemperatureController extends Controller
{
    public function index(){
        return view('params.temperature.index');
    }

    public function currentTemperature(){
        return CurrentTemperature::get()->last()->degrees;
    }
}
