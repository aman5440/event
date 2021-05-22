<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\AppointmentDay;
use App\Models\AppointmentTiming;
use App\Models\BookedAppointment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $appointment = Appointment::factory()->create();

        $monday = AppointmentDay::create([
            'appointment_id'    =>  $appointment->id,
            'day_title'         =>  'Monday'
        ]);

        $tuesday = AppointmentDay::create([
            'appointment_id'    =>  $appointment->id,
            'day_title'         =>  'Tuesday'
        ]);

        $wednesday = AppointmentDay::create([
            'appointment_id'    =>  $appointment->id,
            'day_title'         =>  'Wednesday'
        ]);

        $thursday = AppointmentDay::create([
            'appointment_id'    =>  $appointment->id,
            'day_title'         =>  'Thursday'
        ]);



        AppointmentTiming::create([
            'appointment_id'    =>  $appointment->id,
            'appointment_days_id'    =>  $monday->id,
            'type'              =>  1,
            'start_time'        =>  "06:00",
            'end_time'          =>  "19:00",
        ]);
        AppointmentTiming::create([
            'appointment_id'    =>  $appointment->id,
            'appointment_days_id'    =>  $monday->id,
            'type'              =>  0,
            'start_time'        =>  "11:00",
            'end_time'          =>  "11:30",
        ]);
        AppointmentTiming::create([
            'appointment_id'    =>  $appointment->id,
            'appointment_days_id'    =>  $monday->id,
            'type'              =>  0,
            'start_time'        =>  "15:00",
            'end_time'          =>  "16:00",
        ]);

        AppointmentTiming::create([
            'appointment_id'    =>  $appointment->id,
            'appointment_days_id'    =>  $tuesday->id,
            'type'              =>  1,
            'start_time'        =>  "06:00",
            'end_time'          =>  "19:00",
        ]);
        AppointmentTiming::create([
            'appointment_id'    =>  $appointment->id,
            'appointment_days_id'    =>  $tuesday->id,
            'type'              =>  0,
            'start_time'        =>  "11:00",
            'end_time'          =>  "11:30",
        ]);
        AppointmentTiming::create([
            'appointment_id'    =>  $appointment->id,
            'appointment_days_id'    =>  $tuesday->id,
            'type'              =>  0,
            'start_time'        =>  "15:00",
            'end_time'          =>  "16:00",
        ]);



        AppointmentTiming::create([
            'appointment_id'    =>  $appointment->id,
            'appointment_days_id'    =>  $wednesday->id,
            'type'              =>  1,
            'start_time'        =>  "06:00",
            'end_time'          =>  "19:00",
        ]);
        AppointmentTiming::create([
            'appointment_id'    =>  $appointment->id,
            'appointment_days_id'    =>  $wednesday->id,
            'type'              =>  0,
            'start_time'        =>  "11:00",
            'end_time'          =>  "11:30",
        ]);
        AppointmentTiming::create([
            'appointment_id'    =>  $appointment->id,
            'appointment_days_id'    =>  $wednesday->id,
            'type'              =>  0,
            'start_time'        =>  "15:00",
            'end_time'          =>  "16:00",
        ]);

        AppointmentTiming::create([
            'appointment_id'    =>  $appointment->id,
            'appointment_days_id'    =>  $thursday->id,
            'type'              =>  1,
            'start_time'        =>  "06:00",
            'end_time'          =>  "22:00",
        ]);
        AppointmentTiming::create([
            'appointment_id'    =>  $appointment->id,
            'appointment_days_id'    =>  $thursday->id,
            'type'              =>  0,
            'start_time'        =>  "11:00",
            'end_time'          =>  "11:30",
        ]);
        AppointmentTiming::create([
            'appointment_id'    =>  $appointment->id,
            'appointment_days_id'    =>  $thursday->id,
            'type'              =>  0,
            'start_time'        =>  "19:00",
            'end_time'          =>  "19:30",
        ]);

        BookedAppointment::create([
            'appointment_id'    =>  $appointment->id,
            'appointment_day_id'    =>  $monday->id,
            'booking_slot'          =>  '10:10',
            'email'              =>  0,
            'first_name'        =>  "Amandeep",
            'last_name'          =>  "Singh",
        ]);


    }
}
