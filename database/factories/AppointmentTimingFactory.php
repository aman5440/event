<?php

namespace Database\Factories;

use App\Models\AppointmentTiming;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentTimingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AppointmentTiming::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'appointment_id'  =>  $this->faker->randomNumber,
            'type'              =>  $this->faker->numberBetween(0,1),
            'start_time'        =>  "0".$this->faker->numberBetween(0,9).":".$this->faker->numberBetween(10,23),
            'end_time'          =>  "0".$this->faker->numberBetween(0,9).":".$this->faker->numberBetween(10,23),
        ];
    }
}
