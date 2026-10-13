<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'clinic_id', // ADDED
        'role',      // ADDED
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // RELATIONS
    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }

    public function screenedChildren()
    {
        return $this->hasMany(Child::class, 'screened_by');
    }

    // HELPERS FOR MASOLO LABS
    public function isSuperAdmin()
    {
        return $this->role === 'super_admin';
    }

    public function isClinicAdmin()
    {
        return $this->role === 'clinic_admin';
    }

    public function isNurse()
    {
        return $this->role === 'nurse' || !$this->role;
    }

    public function hasActiveSubscription()
    {
        if ($this->isSuperAdmin()) return true; // Super admin never blocked
        if (!$this->clinic) return false;
        return $this->clinic->isActive();
    }
}