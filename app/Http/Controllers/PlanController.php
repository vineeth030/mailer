<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::all();
        return view('plans.index', compact('plans'));
    }

    public function select(Request $request, Plan $plan)
    {
        $user = auth()->user();
        $user->plan_id = $plan->id;
        $user->save();

        return redirect()->route('dashboard.index')->with('success', 'Plan selected successfully!');
    }
}