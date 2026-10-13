<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    protected $fillable = [
        'clinic_id', // <--- ADDED for unlimited clinics isolation
        'name',
        'age',
        'gender',
        'weight_kg',
        'height_cm',
        'muac_cm',
        'bmi',
        'village',
        'parent_name',
        'phone',
        'status',
        'must_score',
        'must_risk',
        'acute_disease',
        'notes',
        'screened_by'
    ];

    protected $casts = [
        'age' => 'integer',
        'weight_kg' => 'float',
        'height_cm' => 'float',
        'muac_cm' => 'float',
        'bmi' => 'float',
        'must_score' => 'integer',
    ];

    // RELATION: Child belongs to one clinic
    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }

    public function screener()
    {
        return $this->belongsTo(User::class, 'screened_by');
    }

    // MAGIC: Auto-isolation for UNLIMITED clinics
    // Bweyogerere will NEVER see Mulago children
    protected static function booted()
    {
        // 1. FILTER: Only show children for logged-in clinic (unless super_admin)
        static::addGlobalScope('clinic', function ($query) {
            if (auth()->check() && auth()->user()->clinic_id && auth()->user()->role !== 'super_admin') {
                $query->where('clinic_id', auth()->user()->clinic_id);
            }
        });

        // 2. AUTO-ASSIGN: When nurse creates child, auto-assign their clinic_id
        static::creating(function ($child) {
            if (auth()->check() && auth()->user()->clinic_id) {
                $child->clinic_id = auth()->user()->clinic_id;
            }
            if (auth()->check()) {
                $child->screened_by = auth()->id();
            }
        });
    }

    // MUST Helper
    public function getMustColorAttribute()
    {
        if ($this->must_risk == 'high') return 'danger';
        if ($this->must_risk == 'medium') return 'warning';
        return 'success';
    }
}