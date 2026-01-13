<?php

namespace Tests\Feature;

use App\Models\Doctor;
use App\Models\Queue;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class QueueTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_user_cannot_register_if_quota_full() {
    $user = User::factory()->create();
    $doctor = Doctor::factory()->create();

    Queue::factory()->count(20)->create([
        'doctor_id'=>$doctor->id,
        'visit_date'=>now()->toDateString()
    ]);

    $this->actingAs($user)
        ->post('/queue',[
            'doctor_id'=>$doctor->id,
            'visit_date'=>now()->toDateString(),
            'complaint'=>'Keluhan panjang sekali'
        ])->assertStatus(403);
}
}
