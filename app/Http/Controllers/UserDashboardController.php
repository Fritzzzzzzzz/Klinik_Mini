<?php

namespace App\Http\Controllers;

use App\Models\Queue;

class UserDashboardController extends Controller
{
    public function index()
    {
        $queues = Queue::with('doctor.poli')
            ->where('user_id', auth()->id())
            ->orderBy('visit_date','desc')
            ->get();

        return view('user.dashboard', compact('queues'));
    }
}