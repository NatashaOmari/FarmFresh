<?php

namespace Database\Factories;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fauna>
 */
class FaunaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'name'=>fake()->name,
            'user_id'=>User::pluck('id')->random(),
            'number'=>fake()->numberBetween(2,10),
            'disease'=>fake()->sentence(),
            
        ];
    }
}
