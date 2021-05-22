<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentDay extends Model
{
    use HasFactory;

    public function appointment_timings()
    {
        return $this->hasMany(AppointmentTiming::class,'appointment_days_id');
    }
}
