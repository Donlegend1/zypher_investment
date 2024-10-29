<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\EarningsSchedule;
use App\Http\Requests\StorePlanRequest;
use App\Http\Requests\UpdatePlanRequest;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $investmentPlans = Plan::with('earningsSchedules')
        ->paginate(10)
            ->through(function ($plan) {
                $plan->earning_days = $plan->earningsSchedules->pluck('earning_day')->implode(', ');
                return $plan;
            });
        return view('dashboard.admin.plans.list', compact('investmentPlans'));
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePlanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlanRequest $request, Plan $plan)
    {
        // Validate the request data
        $request->validate([
            'plan_name' => 'required|string|max:255',
            'description' => 'required|string',
            'min_investment' => 'required|numeric|min:0',
            'max_investment' => 'nullable|numeric|min:0',
            'interest_rate' => 'required|numeric|min:0',
            'duration_in_days' => 'required|integer|min:1',
            'earning_days' => 'required|array', // Make sure this is an array
            'earning_days.*' => 'required|string', // Validate each earning day
            'earnings_type' => 'required|string|in:fixed,variable',
            'status' => 'required|boolean',
        ]);

        // Update the investment plan
        $plan->name = $request->plan_name;
        $plan->description = $request->description;
        $plan->min_investment = $request->min_investment;
        $plan->max_investment = $request->max_investment;
        $plan->interest_rate = $request->interest_rate;
        $plan->duration_in_days = $request->duration_in_days;
        $plan->earnings_type = $request->earnings_type;
        $plan->status = $request->status; // Assuming you want to update the status
        $plan->save();

        // Clear old earnings schedule
        $plan->earningsSchedules()->delete(); // Assuming there is a relationship defined

        // Insert new earnings schedule
        foreach ($request->earning_days as $day) {
            if (!empty($day)) {
                $plan->earningsSchedules()->create(['earning_day' => trim($day)]);
            }
        }

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Investment plan updated successfully');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlanRequest  $request
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlanRequest $request, $id)
    {
        // Validate the request data
        // $request->validate([
        //     'plan_name' => 'required|string|max:255',
        //     'description' => 'nullable|string',
        //     'min_investment' => 'required|numeric|min:0',
        //     'max_investment' => 'nullable|numeric|min:0',
        //     'interest_rate' => 'required|numeric|min:0',
        //     'duration_in_days' => 'required|integer|min:1',
        //     'earning_days' => 'required|string', // Assuming earning_days is a comma-separated string
        // ]);
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'min_investment' => 'required|numeric|min:0',
            'max_investment' => 'required|numeric|min:0',
            'interest_rate' => 'required|numeric|min:0|max:100',
            'duration_in_days' => 'required|integer|min:0',
            'earnings_type' => 'required|string',
            'earning_days' => 'required|string',
            'status' => 'required',
        ]);

        $plan = Plan::find($id);
        // Update the investment plan
        $plan->name = $request->name;
        $plan->description = $request->description;
        $plan->min_investment = $request->min_investment;
        $plan->max_investment = $request->max_investment;
        $plan->interest_rate = $request->interest_rate;
        $plan->duration_in_days = $request->duration_in_days;
        $plan->status = $request->status;
        $plan->save();

        // Clear old earnings schedule
        $plan->earningsSchedules()->delete(); // Assuming there is a relationship defined

        // Process earning days
        $earning_days = array_map('trim', explode(',', $request->earning_days));

        // Insert new earnings schedule
        foreach ($earning_days as $day) {
            if (!empty($day)) {
                $plan->earningsSchedules()->create(['earning_day' => $day]);
            }
        }

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Investment plan updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->plan_id;
        $plan = Plan::find($id);

        if ($plan) {
            // Delete related earnings schedules first
            EarningsSchedule::where('plan_id', $plan->id)->delete();

            // Delete the investment plan
            if ($plan->delete()) {
                return redirect()->back()->with('success', 'Investment plan deleted successfully');
            } else {
                return redirect()->back()->with('error', 'Failed to delete investment plan');
            }
        } else {
            return redirect()->back()->with('error', 'Investment plan not found');
        }
    }

}