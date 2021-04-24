<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

           'order_number'=>$this->faker->randomDigit,
           	'order_time'=>$this->faker->date($format = 'Y-m-d', $max = 'now'),
            'user_id'=>User::all(['id'])->random(),
            ];
    }
}