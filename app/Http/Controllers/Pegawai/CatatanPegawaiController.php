<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catatan;
use App\Models\Anggaran;
use Illuminate\Support\Facades\Auth;

class CatatanPegawaiController extends Controller
{
    public function index()
    {
        $catatan = Catatan::where('user_id', Auth::id())
            ->with('anggaran') // supaya data anggaran langsung ikut diambil
            ->latest()
            ->get();

        return view('dashboard-pegawai', compact('catatan'));
    }

    public function create()
    {
        return view('pegawai.catatan.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'tujuan' => 'required|string|max:255',
        'tanggal' => 'required|date',
        'keterangan' => 'nullable|string',
        'jumlah_anggaran' => 'required|integer|min:0',
        'keterangan_anggaran' => 'nullable|string',
    ]);

    // Simpan catatan
    $catatan = Catatan::create([
        'user_id' => Auth::id(),
        'tujuan' => $request->tujuan,
        'tanggal' => $request->tanggal,
        'keterangan' => $request->keterangan,
    ]);

    // Simpan anggaran yang terhubung ke catatan ini
    $catatan->anggaran()->create([
        'jumlah' => $request->jumlah_anggaran,
        'keterangan' => $request->keterangan_anggaran,
    ]);

    return redirect()
        ->route('pegawai.dashboard')
        ->with('success', 'Catatan perjalanan berhasil ditambahkan beserta anggarannya.');
}

}
