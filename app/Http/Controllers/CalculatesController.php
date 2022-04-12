<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalculateRequest;
use App\Models\Plan;
use App\Models\Tax;

class CalculatesController extends Controller
{
    public function __construct(Tax $tax, Plan $plan)
    {
        $this->tax = $tax;
        $this->plan = $plan;
    }

    public function calculate(CalculateRequest $request)
    {
        $data = $request->validated();

        if (!$tax = $this->tax->where('origin_code', $data['origin'])
            ->where('destiny_code', $data['destiny'])->first()) {
            return response()->json(['error' => "Tarifa não localizada"], 403);
        };

        $plan = $this->plan->where('id', $data['plan'])->first();

        $extra_minutes = intval($data['time']) - intval($plan->minutes);

        $withPlan_price = 0;
        $withouPlan_price = abs($data['time']) * $tax->price;

        if ($extra_minutes > 0) {
            $withPlan_price = (abs($extra_minutes) * $tax->price) * 1.10;
        }

        return response()->json(['msg' => [
            'withPlan_price'    => $withPlan_price,
            'withoutPlan_price'  => $withouPlan_price
        ]], 200);
    }
}
