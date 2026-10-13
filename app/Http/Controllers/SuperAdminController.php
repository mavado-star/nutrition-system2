<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function index(){
        $clinics = User::whereIn('role', ['clinic_admin','admin'])->get();
        return view('superadmin.clinics.index', compact('clinics'));
    }

    public function approve($id){
        $clinic = User::findOrFail($id);
        $clinic->is_approved = 1;
        $clinic->save();
        return back()->with('success','Clinic Approved Successfully');
    }
}