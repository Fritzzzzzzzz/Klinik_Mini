<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Queue;

class UserDashboardController extends Controller
{
    public function index()
    {
        $queues = Queue::with(['doctor.poli'])
            ->where('user_id', auth()->id())
            ->orderByDesc('visit_date')
            ->get();

        return view('user.dashboard', compact('queues'));
    }
}