<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Clinic extends Model
{
    protected $fillable = ['name','district','contact_person','phone','email','subscription_status','subscription_ends_at','plan'];
    public function users(){ return $this->hasMany(User::class); }
    public function children(){ return $this->hasMany(Child::class); }
    public function isActive(){
        return $this->subscription_status == 'active' || ($this->subscription_status == 'trial' && $this->subscription_ends_at >= now());
    }
}