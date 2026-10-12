<?php

namespace App\Http\Controllers;

use App\Models\Child;
use Illuminate\Http\Request;

class ChildController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $children = Child::when($search, function($q) use ($search){
            $q->where('name','like',"%{$search}%")
              ->orWhere('village','like',"%{$search}%")
              ->orWhere('status','like',"%{$search}%")
              ->orWhere('parent_name','like',"%{$search}%")
              ->orWhere('id','like',"%{$search}%");
        })->latest()->paginate(100)->withQueryString();

        return view('children.index', compact('children'));
    }

    public function create()
    {
        return view('children.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|numeric|min:0|max:216',
            'village' => 'required|string',
            'muac_cm' => 'required|numeric|min:5|max:30',
            'weight_kg' => 'required|numeric|min:1|max:200',
            'height_cm' => 'required|numeric|min:30|max:250',
        ]);

        $muac = $request->muac_cm;
        $hm = $request->height_cm / 100;
        $bmi = $hm > 0 ? $request->weight_kg / ($hm * $hm) : 0;

        if($muac < 11.5) $status = 'RED';
        elseif($muac < 12.5) $status = 'YELLOW';
        else $status = 'GREEN';

        Child::create([
            'name' => $request->name,
            'age' => $request->age,
            'gender' => $request->gender,
            'weight_kg' => $request->weight_kg,
            'height_cm' => $request->height_cm,
            'muac_cm' => $muac,
            'bmi' => round($bmi,2),
            'village' => $request->village,
            'parent_name' => $request->parent_name,
            'phone' => $request->phone,
            'status' => $status
        ]);

        return redirect('/children')->with('success','Child registered successfully - Unlimited System');
    }

    public function destroy($id)
    {
        Child::findOrFail($id)->delete();
        return back()->with('success','Deleted');
    }
}