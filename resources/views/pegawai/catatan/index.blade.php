@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Catatan Perjalanan</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>    
                <th>Tujuan</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Anggaran (Rp)</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($catatan as $item)
                <tr>
                    <td>{{ $item->tujuan }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>
                        {{-- Cek apakah catatan punya anggaran --}}
                        {{ $item->anggaran ? number_format($item->anggaran->jumlah, 0, ',', '.') : '-' }}
                    </td>
                    <td>
                        <a href="{{ route('pegawai.catatan.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('pegawai.catatan.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus catatan ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
