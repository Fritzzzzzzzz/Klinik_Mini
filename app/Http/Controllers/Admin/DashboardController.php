<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Poli;
use App\Models\Doctor;
use App\Models\Queue;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();

        return view('admin.dashboard', [
            'totalPoli' => Poli::count(),
            'totalDoctor' => Doctor::count(),
            'totalQueueToday' => Queue::whereDate('visit_date',$today)->count(),
            'queues' => Queue::with(['user','doctor.poli'])
                ->whereDate('visit_date',$today)
                ->orderBy('queue_number')
                ->get()
        ]);
    }
}