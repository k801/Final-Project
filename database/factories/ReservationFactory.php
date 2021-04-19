<?php

namespace Database\Factories;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reservation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'name'=>$this->faker->name(),
            'email'=>$this->faker->safeEmail,
            'date'=>$this->faker->date($format = 'Y-m-d', $max = 'now'),
            'table_number'=>$this->faker->randomDigit,
            'guests_number'=>$this->faker->randomDigit,
            'time'=>$this->faker->time($format = 'H:i:s', $max = 'now'),
            'status'=>$this->faker->randomElement(['pendding','cancelled','confirmed'])

        ];
    }
}
