<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\Poli;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorFactory extends Factory
{
    protected $model = Doctor::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'poli_id' => Poli::factory(),
            'schedule_day' => 'Senin',
            'start_time' => '08:00',
            'end_time' => '12:00',
        ];
    }
}
