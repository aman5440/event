<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    // public function appointment_timings()
    // {
    //     return $this->hasMany(AppointmentTiming::class);
    // }

    public function appointment_days()
    {
        return $this->hasMany(AppointmentDay::class);
    }

    public function appointment_booked()
    {
        return $this->hasMany(BookedAppointment::class);
    }
    
}
