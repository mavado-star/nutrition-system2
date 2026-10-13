<?php
namespace App\Http\Controllers\SuperAdmin;
use App\Http\Controllers\Controller;
use App\Models\Clinic; use App\Models\User;
use Illuminate\Http\Request; use Illuminate\Support\Facades\Hash;
class ClinicController extends Controller
{
    public function index(){ $clinics = Clinic::withCount('children','users')->latest()->get(); return view('superadmin.clinics.index', compact('clinics')); }
    public function create(){ return view('superadmin.clinics.create'); }
    public function store(Request $r){
        $r->validate(['name'=>'required','email'=>'required|email','phone'=>'required','district'=>'required']);
        $clinic = Clinic::create(['name'=>$r->name,'district'=>$r->district,'phone'=>$r->phone,'email'=>$r->email,'subscription_status'=>'active','subscription_ends_at'=>now()->addDays(30),'plan'=>'basic']);
        User::create(['name'=>$r->name.' Admin','email'=>$r->email,'password'=>Hash::make('password123'),'clinic_id'=>$clinic->id,'role'=>'clinic_admin']);
        return redirect('/super-admin/clinics')->with('success','Created: '.$r->email.' / password123');
    }
    public function toggleSubscription(Clinic $clinic){
        $clinic->update(['subscription_status'=>$clinic->subscription_status=='active'?'expired':'active','subscription_ends_at'=>now()->addMonth()]);
        return back();
    }
}