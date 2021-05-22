<?php

namespace Database\Factories;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Appointment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' =>  $this->faker->word,
            'duration'  =>  $this->faker->numberBetween(10,40),
            'prepration_time'  =>  $this->faker->numberBetween(5,40),
            'max_participants'  =>  $this->faker->numberBetween(1,5),
            'advanced_bookable'  =>  $this->faker->numberBetween(5,40),
            'description' =>  $this->faker->paragraph,
        ];
    }
}
