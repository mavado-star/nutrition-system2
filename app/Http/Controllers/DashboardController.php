<?php
namespace App\Http\Controllers;
use App\Models\Child;
class DashboardController extends Controller {
    public function index(){
        $total = Child::count();
        $green = Child::where('muac_cm','>',12.5)->count();
        $yellow = Child::whereBetween('muac_cm',[11.5,12.5])->count();
        $red = Child::where('muac_cm','<',11.5)->count();
        return view('dashboard', compact('total','green','yellow','red'));
    }
}