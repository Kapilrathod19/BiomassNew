<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function PlanList()
    {
        $plans = Plan::latest()->get();
        return view('Admin/Plan/plan_list', compact('plans'));
    }

    public function Add_Plan()
    {
        return view('Admin/Plan/add_plan');
    }

    public function Store_Plan(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required',
            'time' => 'required',
            'details' => 'nullable',
        ]);

        Plan::create([
            'title' => $request->title,
            'price' => $request->price,
            'time' => $request->time,
            'details' => $request->details,
            'link' => $request->link,
        ]);

        return redirect()->route('admin.plan')->with('success', 'Plan created successfully!');
    }

    public function Edit_Plan($id)
    {
        $plan = Plan::findOrFail($id);
        return view('Admin/Plan/edit_plan', compact('plan'));
    }

    public function Update_Plan(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required',
            'time' => 'required',
            'details' => 'nullable',
        ]);

        $plan = Plan::findOrFail($request->id);

        $plan->update([
            'title' => $request->title,
            'price' => $request->price,
            'time' => $request->time,
            'details' => $request->details,
            'link' => $request->link,
        ]);

        return redirect()->route('admin.plan')->with('success', 'Plan updated successfully!');
    }

    public function Delete_Plan(Request $request)
    {
        $Plan = Plan::find($request->id);
        if ($Plan) {
            $Plan->delete();
            return redirect()->route('admin.plan')->with('success', 'Plan deleted successfully!');
        } else {
            return redirect()->route('admin.plan')->with('error', 'Plan not found!');
        }
    }
}
