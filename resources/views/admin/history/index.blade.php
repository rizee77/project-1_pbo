@extends('layouts.app')

@section('content')
<div class="container">
    <h2>History Perjalanan</h2>

    <form method="GET" action="{{ route('admin.history.index') }}" class="mb-4">
        <div>
            <label>Pegawai</label>
            <select name="pegawai_id">
                <option value="">-- Semua Pegawai --</option>
                @foreach($pegawai as $p)
                    <option value="{{ $p->id }}" {{ request('pegawai_id') == $p->id ? 'selected' : '' }}>
                        {{ $p->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Tanggal Awal</label>
            <input type="date" name="tanggal_awal" value="{{ request('tanggal_awal') }}">
        </div>

        <div>
            <label>Tanggal Akhir</label>
            <input type="date" name="tanggal_akhir" value="{{ request('tanggal_akhir') }}">
        </div>

        <button type="submit">Filter</button>
        <a href="{{ route('admin.history.cetak', request()->all()) }}" target="_blank">Cetak PDF</a>
    </form>

    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>Pegawai</th>
                <th>Tujuan</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Anggaran</th>
            </tr>
        </thead>
        <tbody>
            @forelse($catatan as $c)
                <tr>
                    <td>{{ $c->user->name }}</td>
                    <td>{{ $c->tujuan }}</td>
                    <td>{{ $c->tanggal }}</td>
                    <td>{{ $c->keterangan }}</td>
                    <td>{{ $c->anggaran?->jumlah ? 'Rp ' . number_format($c->anggaran->jumlah, 0, ',', '.') : '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" align="center">Tidak ada data perjalanan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
