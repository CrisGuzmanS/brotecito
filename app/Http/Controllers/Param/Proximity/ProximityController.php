<?php

namespace App\Http\Controllers\Param\Proximity;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Proximity;

class ProximityController extends Controller
{
    public function index(){
        return view('params.proximity.index');
    }

    public function currentProximity(){
        return Proximity::get()->last()->distance;
    }
}