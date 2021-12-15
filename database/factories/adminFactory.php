<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class adminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           
                'name' => 'admin',
                'email' => $this->faker->unique()->safeEmail(),
                'email_verified_at' => now(),
                'phone' => 1111,
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
               
            
        ];
    }
}
