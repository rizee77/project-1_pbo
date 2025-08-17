<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>History Perjalanan</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid black; padding: 5px; text-align: left; }
    </style>
</head>
<body>
    <h3>History Perjalanan</h3>
    <table>
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
            @foreach($catatan as $c)
                <tr>
                    <td>{{ $c->user->name }}</td>
                    <td>{{ $c->tujuan }}</td>
                    <td>{{ $c->tanggal }}</td>
                    <td>{{ $c->keterangan }}</td>
                    <td>{{ $c->anggaran?->jumlah ? 'Rp ' . number_format($c->anggaran->jumlah, 0, ',', '.') : '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
