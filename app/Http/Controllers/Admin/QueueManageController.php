<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Queue;

class QueueManageController extends Controller
{
    public function callNext($doctorId) {
    $queue = Queue::where('doctor_id',$doctorId)
        ->where('status','WAITING')
        ->orderBy('queue_number')
        ->first();

    if ($queue) {
        $queue->update(['status'=>'CALLED']);
    }
    return back();
}
}
