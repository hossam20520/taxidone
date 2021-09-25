<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Driver;
use App\Models\Travel;

class TravelController extends Controller
{
    //


    public function store(Request $request){
        $travel = Travel::create($request->all());
    }
}
