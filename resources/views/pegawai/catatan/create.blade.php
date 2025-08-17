@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Catatan Perjalanan</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul style="margin-bottom: 0;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('pegawai.catatan.store') }}">
        @csrf
        <div class="form-group">
            <label>Tujuan</label>
            <input type="text" name="tujuan" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label>Anggaran (Rp)</label>
            <input type="number" name="anggaran" class="form-control" min="0" placeholder="Masukkan jumlah anggaran">
        </div>

        <button type="submit" class="btn btn-success mt-2">Simpan</button>
    </form>
</div>
@endsection
