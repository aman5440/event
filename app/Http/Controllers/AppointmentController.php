<?php

namespace App\Http\Controllers;

use DateTime;
use DateInterval;
use App\Models\Appointment;
use App\Models\BookedAppointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    function checkForBreak($start, $end, $breaks = null)
    {
        
        //$interval      = new DateInterval("PT" . $duration . "M");
        $cleanupInterval = new DateInterval("PT0M");
        if($breaks && $breaks->count())
        {
            $return = [];
            
            foreach ($breaks as $break) {
                
                $break_start    = new DateTime($break->start_time);
                $break_start_timestamp = $break_start->getTimestamp();
                $break_end      = new DateTime($break->end_time);
                $break_end_timestamp = $break_end->getTimestamp();
                $start_timestamp = $start->getTimestamp();
                $end_timestamp = $end->getTimestamp();
                if( ($start_timestamp>=$break_start_timestamp && $start_timestamp<=$break_end_timestamp) ||   ($end_timestamp>=$break_start_timestamp && $end_timestamp<=$break_end_timestamp))
                {
                    $return[] = false;
                }
                else{
                    $return[] = true;
                }
            }
            return collect($return)->every(fn($v)=>$v==true);
        }
    }

    function availableSlots($duration, $cleanup, $start, $end, $breaks = null, $booked=null) 
    {
        //dump($booked);
        //dump($duration, $cleanup, $start, $end);
        $start         = new DateTime($start);
        $end           = new DateTime($end);
        $periods = array();
                
        $interval      = new DateInterval("PT" . $duration . "M");
        $cleanupInterval = new DateInterval("PT" . $cleanup . "M");
        $i = 0;
        $incremented = false;
        for ($intStart = $start; $intStart < $end; $intStart->add($interval)->add($cleanupInterval))
        {
            //dump($duration, $cleanup, $start, $end);
            $endPeriod = clone $intStart;
            $endPeriod->add($interval)->add($cleanupInterval);              
            $isValid = $this->checkForBreak($start, $endPeriod, $breaks);
            if($isValid)
            {

                $periods[$intStart->format('H:i A')] = [] ;
                if($booked && $booked->count())
                {
                    
                    foreach ($booked as $key => $booked_app) {
                        
                        $booking_raw_date = new DateTime($booked_app->booking_slot);
                        $slot_booked_by_user = $booking_raw_date->format('H:i A');
                        # code...
                        if(array_key_exists($slot_booked_by_user,$periods) && !$incremented)
                        {
                            $incremented = true;
                            $periods[$intStart->format('H:i A')][$booked_app->date][] = $booked_app;
                        }
                    }
                }
                else
                {
                    //$periods[$intStart->format('H:i A')] = 0;
                }
                //$periods[$i]['number_of_users'] = 1;
            }
            $i++;

        }

        return $periods;
    }
    

    
    //
    public function get($id)
    {
        $appointment = Appointment::with('appointment_days','appointment_days.appointment_timings','appointment_booked')->where('id',$id)->first();
        //dump($appointment);
        if($appointment->appointment_days->count())
        {
            foreach ($appointment->appointment_days as $key => $appointment_day) 
            {
                if($appointment_day->appointment_timings->count())
                {
                    $available_timings = $appointment_day->appointment_timings->filter(fn($appointment) => $appointment->type==1);
                    $break_timings = $appointment_day->appointment_timings->filter(fn($appointment) => $appointment->type==0);
                    $available_timings = $available_timings;
                    $slots = collect([]);
                    $slot[$appointment_day->day_title] = [];
                    foreach ($available_timings as $key => $available_timing) {
                        $slot[$appointment_day->day_title][] = ($this->availableSlots($duration=25, $cleanup=0, $start = $available_timing->start_time, $end = $available_timing->end_time, $break_timings, $appointment->appointment_booked));
                    }
                }
                
            }
        }
        $appointment_detail = $appointment->get(['id','title','duration','prepration_time','max_participants','advanced_bookable','description'])->toArray();
        $data_to_pass = ['appointment_detail'=>$appointment_detail,'availability'=>$slot];
        return response()->json($data_to_pass);
    }
}
