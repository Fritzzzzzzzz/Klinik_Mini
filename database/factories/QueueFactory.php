<?php

namespace Database\Factories;

use App\Models\Queue;
use App\Models\User;
use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

class QueueFactory extends Factory
{
    protected $model = Queue::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'doctor_id' => Doctor::factory(),
            'visit_date' => now()->toDateString(),
            'queue_number' => $this->faker->numberBetween(1, 20),
            'complaint' => $this->faker->sentence(5),
            'status' => 'WAITING',
        ];
    }
}
