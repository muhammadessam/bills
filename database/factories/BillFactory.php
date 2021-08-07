<?php

namespace Database\Factories;

use App\Models\Bill;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class BillFactory extends Factory
{
    protected $model = Bill::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'number' => $this->faker->unique()->randomDigit,
            'amount' => $this->faker->randomDigitNotZero(),
            'status' => $this->faker->randomElement(['open', 'closed']),
            'user_id' => User::factory(),
            'released_at' => $this->faker->date,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
