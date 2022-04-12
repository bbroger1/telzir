<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\AreaCode;
use Illuminate\Http\Request;

class SelectsController extends Controller
{
    public function __construct(AreaCode $areaCode, Plan $plan)
    {
        $this->areaCode = $areaCode;
        $this->plan = $plan;
    }

    public function index()
    {
        $areaCodes = $this->areaCode->orderBy('area_code', 'ASC')->get();

        $plans = $this->plan->all();

        return view('index', compact(['areaCodes', 'plans']));
    }
}
