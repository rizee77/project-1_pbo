<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Catatan;
use App\Models\Anggaran;

class CatatanController extends Controller
{
    // 📌 1. Tampilkan semua catatan pegawai
    public function index()
    {
        $catatanList = Catatan::with('user')->latest()->get();
        $totalPegawai = User::where('role', 'pegawai')->count();
        $totalCatatan = Catatan::count(); 
        $totalAnggaran = Anggaran::sum('jumlah');
        $pegawaiList = User::where('role', 'pegawai')->select('id', 'name', 'email')->get();
        return view('dashboard-admin', compact('catatanList', 'totalPegawai', 'totalCatatan', 'totalAnggaran', 'pegawaiList'));
    }

    public function create()
    {
        $pegawaiList = User::where('role', 'pegawai')->get();
        return view('admin.catatan.create', compact('pegawaiList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'tujuan' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string',
            'jumlah_anggaran' => 'required|integer|min:0',
            'keterangan_anggaran' => 'nullable|string',
        ]);

        $catatan = Catatan::create([
            'user_id' => $request->user_id,
            'tujuan' => $request->tujuan,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
        ]);

        $catatan->anggaran()->create([
            'jumlah' => $request->jumlah_anggaran,
            'keterangan' => $request->keterangan_anggaran,
        ]);

        return redirect()->route('dashboard.admin')->with('success', 'Catatan berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $catatan = Catatan::findOrFail($id);
        $pegawaiList = User::where('role', 'pegawai')->get();
        return view('admin.catatan.edit', compact('catatan', 'pegawaiList'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'tujuan' => 'required|string|max:255',
        'tanggal' => 'required|date',
        'keterangan' => 'nullable|string',
        'jumlah_anggaran' => 'required|integer|min:0',
        'keterangan_anggaran' => 'nullable|string',
    ]);

    $catatan = Catatan::findOrFail($id);

    $catatan->update([
        'user_id' => $request->user_id,
        'tujuan' => $request->tujuan,
        'tanggal' => $request->tanggal,
        'keterangan' => $request->keterangan,
    ]);

    // Update atau buat anggaran baru
    if ($catatan->anggaran) {
        $catatan->anggaran->update([
            'jumlah' => $request->jumlah_anggaran,
            'keterangan' => $request->keterangan_anggaran,
        ]);
    } else {
        $catatan->anggaran()->create([
            'jumlah' => $request->jumlah_anggaran,
            'keterangan' => $request->keterangan_anggaran,
        ]);
    }

    return redirect()->route('admin.catatan.index')->with('success', 'Catatan berhasil diperbarui.');
}


    // 📌 6. Hapus catatan
    public function destroy($id)
    {
        $catatan = Catatan::findOrFail($id);
        $catatan->delete();

        return redirect()->route('dashboard.admin')
            ->with('success', 'Catatan berhasil dihapus.');
    }
}
