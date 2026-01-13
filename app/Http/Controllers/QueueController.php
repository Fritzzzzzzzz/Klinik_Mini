<?php

namespace App\Http\Controllers;

use App\Models\Queue;
use App\Models\Poli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QueueController extends Controller
{
    /* =========================
     |  USER – BUAT JANJI TEMU
     ========================= */
    public function create()
    {
        return view('user.appointment', [
            'polis' => Poli::with('doctors')->get()
        ]);
    }

    public function store(Request $request)
    {
    $request->validate([
        'doctor_id' => 'required|exists:doctors,id',
        'complaint' => 'required|string|min:5',
    ]);

    $today = now()->toDateString();

    // HITUNG JUMLAH ANTRIAN DOKTER HARI INI
    $queueCount = Queue::where('doctor_id', $request->doctor_id)
        ->whereDate('visit_date', $today)
        ->count();

    // BATASI KUOTA (MISAL 20)
    if ($queueCount >= 20) {
        abort(403, 'Kuota dokter hari ini sudah penuh');
    }

    Queue::create([
        'user_id' => Auth::id(),
        'doctor_id' => $request->doctor_id,
        'visit_date' => $today,
        'queue_number' => $queueCount + 1,
        'complaint' => $request->complaint,
        'status' => 'WAITING'
    ]);

    return redirect()
        ->route('user.dashboard')
        ->with('success', 'Janji temu berhasil dibuat');
    }


    /* =========================
     |  USER – CANCEL ANTRIAN
     ========================= */
    public function cancel(Queue $queue)
    {
        $this->authorize('cancel', $queue);

        $queue->update([
            'status' => 'CANCELED'
        ]);

        return back()->with('success', 'Antrian dibatalkan');
    }
}