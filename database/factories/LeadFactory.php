<?php

namespace Database\Factories;

use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

class LeadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_created_id'   => 1,
            'user_assigned_id'  => 1,
            'name'              => $this->faker->name,
            'phone'             => $this->faker->PhoneNumber,
            'email'             => $this->faker->email,
            'source'            => $this->faker->word,
            'description'       => $this->faker->sentence,
            'company'           => 'Microsoft',
            'division'          => 'Dhaka',
            'district'          => 'Gazipur',
            'upazila'           => 'Amraid',
            'status_id'         => Status::factory()->create()
        ];
    }
}
