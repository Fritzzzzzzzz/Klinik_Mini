<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Poli;
use Illuminate\Http\Request;

class PoliController extends Controller
{
    public function index()
    {
        $polis = Poli::all();
        return view('admin.poli', compact('polis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Poli::create($request->all());

        return redirect()->back()->with('success', 'Poli berhasil ditambahkan');
    }

    public function update(Request $request, Poli $poli)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $poli->update($request->all());

        return redirect()->back()->with('success', 'Poli berhasil diupdate');
    }

    public function destroy(Poli $poli)
    {
        $poli->delete();
        return redirect()->back()->with('success', 'Poli berhasil dihapus');
    }
}