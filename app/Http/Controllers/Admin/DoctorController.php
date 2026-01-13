<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Poli;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with('poli')->get();
        $polis = Poli::all();

        return view('admin.doctor', compact('doctors', 'polis'));
    }

    public function store(Request $request)
    {
    $request->validate([
        'name' => 'required|string',
        'poli_id' => 'required|exists:polis,id',
        'schedule_day' => 'required',
        'start_time' => 'required',
        'end_time' => 'required|after:start_time',
    ]);

    Doctor::create([
        'name' => $request->name,
        'poli_id' => $request->poli_id,
        'schedule_day' => $request->schedule_day,
        'start_time' => $request->start_time,
        'end_time' => $request->end_time,
    ]);

    return redirect()->back()->with('success', 'Dokter berhasil ditambahkan');
    }

    public function update(Request $request, Doctor $doctor)
    {
    $request->validate([
        'name' => 'required',
        'poli_id' => 'required',
        'schedule_day' => 'required',
        'start_time' => 'required',
        'end_time' => 'required|after:start_time',
    ]);

    $doctor->update([
        'name' => $request->name,
        'poli_id' => $request->poli_id,
        'schedule_day' => $request->schedule_day,
        'start_time' => $request->start_time,
        'end_time' => $request->end_time,
    ]);

    return redirect()->back()->with('success','Data dokter diperbarui');
    }

    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->back()->with('success', 'Dokter berhasil dihapus');
    }
}