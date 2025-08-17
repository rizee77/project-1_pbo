<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catatan;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\User;

class HistoryController extends Controller
{
    public function index(Request $request)
    {
        $query = Catatan::with('user');

        if ($request->pegawai_id) {
            $query->where('user_id', $request->pegawai_id);
        }

        if ($request->tanggal_awal && $request->tanggal_akhir) {
            $query->whereBetween('tanggal', [$request->tanggal_awal, $request->tanggal_akhir]);
        }

        $catatan = $query->latest()->get();
        $pegawai = User::where('role', 'pegawai')->get();

        return view('admin.history.index', compact('catatan', 'pegawai'));
    }

    public function cetakPDF(Request $request)
    {
        $query = Catatan::with('user');

        if ($request->pegawai_id) {
            $query->where('user_id', $request->pegawai_id);
        }

        if ($request->tanggal_awal && $request->tanggal_akhir) {
            $query->whereBetween('tanggal', [$request->tanggal_awal, $request->tanggal_akhir]);
        }

        $catatan = $query->latest()->get();

        $pdf = Pdf::loadView('admin.history.pdf', compact('catatan'))
            ->setPaper('a4', 'portrait');

        return $pdf->download('history_perjalanan.pdf');
    }
}
