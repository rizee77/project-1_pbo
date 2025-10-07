<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Catatan;
use App\Models\Anggaran;
use Illuminate\Support\Facades\Auth;

class DashboardAdminController extends Controller
{
    public function index()
    {
        $totalPegawai = User::where('role', 'pegawai')->count();
        $totalCatatan = Catatan::count();
        $totalAnggaran = Anggaran::sum('jumlah');

        $catatanList = Catatan::with('user')->get();
        $pegawaiList = User::where('role', 'pegawai')->get();

        return view('dashboard-admin', compact(
            'totalPegawai',
            'totalCatatan',
            'totalAnggaran',
            'catatanList',
            'pegawaiList'
        ));
    }
    public function destroyPegawai($id)
    {
        $pegawaiList = User::where('role', 'pegawai')->findOrFail($id);
        $pegawaiList->delete();

    return redirect()->route('dashboard.admin')->with('success', 'Akun pegawai berhasil dihapus');
}
}

