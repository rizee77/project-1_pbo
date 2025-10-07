<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Catatan;
use Illuminate\Http\Request;

class DashboardPegawaiController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $catatan = Catatan::where('user_id', $user->id)->latest()->get();

        return view('dashboard-pegawai', compact('user', 'catatan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tujuan' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        Catatan::create([
            'user_id' => Auth::id(),
            'tujuan' => $request->tujuan,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('pegawai.dashboard')->with('success', 'Catatan berhasil ditambahkan!');
    }
}
