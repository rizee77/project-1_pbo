<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 30%, #0f3460 70%, #0f0f23 100%);
            min-height: 100vh;
            color: #e2e8f0;
            position: relative;
            overflow-x: hidden;
        }

        /* Animated background elements */
        body::before {
            content: '';
            position: fixed;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle at 30% 20%, rgba(99, 102, 241, 0.08) 0%, transparent 50%),
                        radial-gradient(circle at 70% 80%, rgba(147, 51, 234, 0.06) 0%, transparent 50%),
                        radial-gradient(circle at 20% 70%, rgba(59, 130, 246, 0.04) 0%, transparent 50%);
            animation: float 25s ease-in-out infinite;
            pointer-events: none;
            z-index: -1;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            33% { transform: translate(-20px, -20px) rotate(120deg); }
            66% { transform: translate(20px, -10px) rotate(240deg); }
        }

        /* Header */
        header {
            background: rgba(26, 26, 46, 0.9);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(99, 102, 241, 0.2);
            padding: 1.5rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.75rem;
            font-weight: 700;
            background: linear-gradient(135deg, #e2e8f0 0%, #a5b4fc 50%, #c7d2fe 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .welcome-text {
            color: #94a3b8;
            font-size: 1rem;
            font-weight: 500;
        }

        /* Container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        /* Statistics Cards */
        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-bottom: 3rem;
        }

        .card {
            background: rgba(30, 30, 46, 0.8);
            backdrop-filter: blur(15px);
            border-radius: 16px;
            padding: 2rem;
            border: 1px solid rgba(99, 102, 241, 0.1);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(99, 102, 241, 0.5), transparent);
        }

        .card:hover {
            transform: translateY(-4px);
            border-color: rgba(99, 102, 241, 0.3);
            box-shadow: 0 12px 48px rgba(99, 102, 241, 0.15);
        }

        .card h3 {
            font-size: 0.875rem;
            color: #94a3b8;
            font-weight: 500;
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .card p {
            font-size: 2rem;
            font-weight: 700;
            color: #e2e8f0;
            line-height: 1;
        }

        /* Section Headers */
        h2 {
            font-size: 1.5rem;
            font-weight: 600;
            color: #e2e8f0;
            margin: 3rem 0 1.5rem 0;
            position: relative;
            padding-left: 1rem;
        }

        h2::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 20px;
            background: linear-gradient(135deg, #6366f1, #a855f7);
            border-radius: 2px;
        }

        /* Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            font-size: 0.875rem;
            font-weight: 500;
            text-decoration: none;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn-success {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        }

        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(16, 185, 129, 0.4);
        }

        .btn-warning {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            color: white;
            box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
        }

        .btn-warning:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(245, 158, 11, 0.4);
        }

        .btn-primary {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(59, 130, 246, 0.4);
        }

        .btn-danger {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: white;
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
        }

        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(239, 68, 68, 0.4);
        }

        /* Button Container */
        .button-container {
            margin-bottom: 1.5rem;
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        /* Table */
        table {
            width: 100%;
            background: rgba(30, 30, 46, 0.8);
            backdrop-filter: blur(15px);
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid rgba(99, 102, 241, 0.1);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            margin-bottom: 2rem;
        }

        thead {
            background: rgba(99, 102, 241, 0.1);
        }

        th, td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid rgba(99, 102, 241, 0.1);
        }

        th {
            font-weight: 600;
            color: #a5b4fc;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        td {
            color: #e2e8f0;
            font-size: 0.9rem;
        }

        tbody tr {
            transition: all 0.3s ease;
        }

        tbody tr:hover {
            background: rgba(99, 102, 241, 0.05);
        }

        /* Action buttons in table */
        td .btn {
            font-size: 0.8rem;
            padding: 0.5rem 1rem;
            margin-right: 0.5rem;
        }

        /* Form styling for delete buttons */
        form {
            display: inline;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }

            .header-content {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
                padding: 0 1rem;
            }

            .stats {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .card {
                padding: 1.5rem;
            }

            table {
                font-size: 0.8rem;
            }

            th, td {
                padding: 0.75rem 0.5rem;
            }

            .button-container {
                flex-direction: column;
            }

            .btn {
                justify-content: center;
            }
        }

        @media (max-width: 640px) {
            /* Make table horizontally scrollable on small screens */
            .table-container {
                overflow-x: auto;
                margin: 0 -1rem;
                padding: 0 1rem;
            }

            table {
                min-width: 600px;
            }
        }

        /* Loading state */
        .loading {
            opacity: 0.6;
            pointer-events: none;
        }

        /* Success message styling if needed */
        .alert {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            border: 1px solid;
        }

        .alert-success {
            background: rgba(34, 197, 94, 0.1);
            border-color: rgba(34, 197, 94, 0.3);
            color: #86efac;
        }

        .alert-danger {
            background: rgba(239, 68, 68, 0.1);
            border-color: rgba(239, 68, 68, 0.3);
            color: #fca5a5;
        }


    </style>
</head>
<body>

<header>
    <div class="header-content">
        <div>
            <h1 class="logo">Dashboard Admin PT Trans Adi Sentosa</h1>
            <p class="welcome-text">Selamat datang, {{ Auth::user()->name }}</p>
        </div>
        <div>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>
    </div>
</header>


<div class="container">

    <!-- Statistik -->
    <div class="stats">
        <div class="card">
            <h3>Total Pegawai</h3>
            <p>{{ $totalPegawai }}</p>
        </div>
        <div class="card">
            <h3>Total Catatan</h3>
            <p>{{ $totalCatatan }}</p>
        </div>
        <div class="card">
            <h3>Total Anggaran</h3>
            <p>Rp {{ number_format($totalAnggaran, 0, ',', '.') }}</p>
        </div>
    </div>

    <!-- Catatan -->
    <h2>Daftar Catatan Perjalanan</h2>
    <div class="button-container">
        <a href="{{ route('admin.catatan.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Tambah Catatan
        </a>
        <a href="{{ route('history.cetak_pdf') }}" target="_blank" class="btn btn-warning">
            <i class="fas fa-file-pdf"></i> Cetak PDF
        </a>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Nama Pegawai</th>
                    <th>Tujuan</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Anggaran (Rp)</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($catatanList as $catatan)
                <tr>
                    <td>{{ $catatan->user->name }}</td>
                    <td>{{ $catatan->tujuan }}</td>
                    <td>{{ $catatan->tanggal }}</td>
                    <td>{{ $catatan->keterangan }}</td>
                    <td>
                        {{ $catatan->anggaran ? number_format($catatan->anggaran->jumlah, 0, ',', '.') : '-' }}
                    <td class="align-middle">
                        <div style="display:flex; flex-direction:row; gap:8px; align-items:center;">
                            <a href="{{ route('admin.catatan.edit', $catatan->id) }}" class="btn btn-primary">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('admin.catatan.destroy', $catatan->id) }}" 
                                method="POST" 
                                onsubmit="return confirm('Yakin ingin menghapus catatan ini?')" 
                                style="margin:0; padding:0;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pegawai -->
    <h2>Daftar Pegawai</h2>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pegawaiList as $pegawai)
                <tr>
                    <td>{{ $pegawai->name }}</td>
                    <td>{{ $pegawai->email }}</td>
                    <td>
                        <form action="{{ route('admin.pegawai.destroy', $pegawai->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus akun ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-user-times"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

<script>
    // Add smooth loading states
    document.querySelectorAll('.btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            if (this.tagName === 'BUTTON' && this.type === 'submit') {
                setTimeout(() => {
                    this.classList.add('loading');
                }, 100);
            }
        });
    });

    // Enhanced table interactions
    document.querySelectorAll('tbody tr').forEach(row => {
        row.addEventListener('mouseenter', function() {
            this.style.transform = 'translateX(4px)';
        });
        
        row.addEventListener('mouseleave', function() {
            this.style.transform = 'translateX(0)';
        });
    });

    // Smooth scroll for internal links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
</script>

</body>
</html>