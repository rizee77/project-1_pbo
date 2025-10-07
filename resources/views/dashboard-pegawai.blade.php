<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <title>Dashboard Pegawai</title>
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

        @keyframes float {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            33% { transform: translate(-20px, -20px) rotate(120deg); }
            66% { transform: translate(20px, -10px) rotate(240deg); }
        }

        /* Container */
        .dashboard-container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 2rem;
        }

        /* Page Title */
        h1 {
            font-size: 2.25rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 2rem;
            background: linear-gradient(135deg, #e2e8f0 0%, #a5b4fc 50%, #c7d2fe 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Alert */
        .alert {
            background: rgba(34, 197, 94, 0.1);
            border: 1px solid rgba(34, 197, 94, 0.3);
            color: #86efac;
            padding: 1rem;
            border-radius: 12px;
            margin-bottom: 2rem;
            animation: slideIn 0.3s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Card */
        .card {
            background: rgba(30, 30, 46, 0.9);
            backdrop-filter: blur(20px);
            border-radius: 16px;
            box-shadow: 
                0 20px 40px -12px rgba(0, 0, 0, 0.4),
                0 0 0 1px rgba(99, 102, 241, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.05);
            margin-bottom: 2rem;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(99, 102, 241, 0.6), transparent);
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 
                0 25px 50px -12px rgba(0, 0, 0, 0.5),
                0 0 0 1px rgba(99, 102, 241, 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
        }

        .card-header {
            padding: 1.5rem 2rem;
            border-bottom: 1px solid rgba(99, 102, 241, 0.1);
            font-size: 1.25rem;
            font-weight: 600;
            color: #a5b4fc;
        }

        .card-body {
            padding: 2rem;
        }

        /* Form styling */
        form {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .mb-3 {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        label {
            font-size: 0.875rem;
            font-weight: 500;
            color: #a5b4fc;
            margin-bottom: 0.5rem;
        }

        input[type="text"],
        input[type="date"],
        input[type="number"],
        textarea {
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid rgba(99, 102, 241, 0.2);
            border-radius: 8px;
            padding: 0.875rem 1rem;
            font-size: 0.9rem;
            color: #e2e8f0;
            transition: all 0.3s ease;
            outline: none;
            font-family: inherit;
        }

        input[type="text"]::placeholder,
        input[type="date"]::placeholder,
        input[type="number"]::placeholder,
        textarea::placeholder {
            color: #94a3b8;
        }

        input[type="text"]:focus,
        input[type="date"]:focus,
        input[type="number"]:focus,
        textarea:focus {
            border-color: rgba(99, 102, 241, 0.5);
            box-shadow: 
                0 0 0 3px rgba(99, 102, 241, 0.1),
                0 4px 6px -1px rgba(0, 0, 0, 0.1);
            background: rgba(15, 23, 42, 0.8);
            transform: translateY(-1px);
        }

        textarea {
            resize: vertical;
            min-height: 80px;
        }

        /* Button */
        .btn-primary {
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 50%, #a855f7 100%);
            border: none;
            border-radius: 8px;
            padding: 0.875rem 2rem;
            font-size: 0.9rem;
            font-weight: 600;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            align-self: flex-start;
            margin-top: 0.5rem;
            box-shadow: 
                0 4px 6px -1px rgba(99, 102, 241, 0.3),
                0 2px 4px -1px rgba(99, 102, 241, 0.1);
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 
                0 10px 20px -5px rgba(99, 102, 241, 0.4),
                0 4px 6px -1px rgba(99, 102, 241, 0.2);
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .btn-primary span {
            position: relative;
            z-index: 1;
        }

        /* Section headers */
        h3 {
            font-size: 1.5rem;
            font-weight: 600;
            color: #e2e8f0;
            margin: 2rem 0 1.5rem 0;
            position: relative;
            padding-left: 1rem;
        }

        h3::before {
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

        /* Table */
        table {
            width: 100%;
            background: rgba(30, 30, 46, 0.9);
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
            transform: translateX(4px);
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .text-center {
            text-align: center;
            color: #94a3b8;
            font-style: italic;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .dashboard-container {
                padding: 1rem;
            }

            h1 {
                font-size: 1.875rem;
            }

            .card-body {
                padding: 1.5rem;
            }

            .card-header {
                padding: 1rem 1.5rem;
                font-size: 1.125rem;
            }

            .mb-3 {
                gap: 1rem;
            }

            table {
                font-size: 0.8rem;
            }

            th, td {
                padding: 0.75rem 0.5rem;
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

            .btn-primary {
                align-self: stretch;
                text-align: center;
            }
        }

        /* Loading state */
        .loading {
            opacity: 0.6;
            pointer-events: none;
        }

        .loading::after {
            content: '';
            position: absolute;
            width: 16px;
            height: 16px;
            margin: auto;
            border: 2px solid transparent;
            border-top-color: #ffffff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
        }

        @keyframes spin {
            0% { transform: translateY(-50%) rotate(0deg); }
            100% { transform: translateY(-50%) rotate(360deg); }
        }

        /* Enhanced form grid for larger screens */
        @media (min-width: 768px) {
            .form-grid {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 1.5rem;
            }

            .form-grid .mb-3:last-of-type {
                grid-column: 1 / -1;
            }
        }
    </style>
</head>
<body>
    <!-- This would extend layouts.app in actual Laravel implementation -->
    <header>
    <div class="header-content">
        <div>
            <h1 class="logo">Dashboard Pegawai PT Trans Adi Sentosa</h1>
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
    <div class="dashboard-container">
        <!-- Success Alert (shown conditionally) -->
        <!-- @if(session('success')) -->
            <!-- <div class="alert">{{ session('success') }}</div> -->
        <!-- @endif -->

        {{-- Form tambah catatan --}}
        <div class="card">
            <div class="card-header">Tambah Catatan Perjalanan</div>
            <div class="card-body">
                <form action="{{ route('pegawai.catatan.store') }}" method="POST">
                    @csrf
                    <div class="form-grid">
                        <div class="mb-3">
                            <label>Tujuan</label>
                            <input type="text" name="tujuan" placeholder="Masukkan tujuan perjalanan" required>
                        </div>
                        <div class="mb-3">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" required>
                        </div>
                        <div class="mb-3">
                            <label>Jumlah Anggaran (Rp)</label>
                            <input type="number" name="jumlah_anggaran" placeholder="0" min="0" required>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label>Keterangan</label>
                        <textarea name="keterangan" rows="3" placeholder="Deskripsi perjalanan (opsional)"></textarea>
                    </div>

                    <div class="mb-3">
                        <label>Keterangan Anggaran</label>
                        <textarea name="keterangan_anggaran" rows="2" placeholder="Detail penggunaan anggaran (opsional)"></textarea>
                    </div>
                    <button type="submit" class="btn-primary"><span>Simpan</span></button>
                </form>
            </div>
        </div>

        {{-- Daftar catatan --}}
        <h3>Catatan Saya</h3>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Tujuan</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Anggaran</th>
                    </tr>
                </thead>
                    <tbody>
                    @forelse($catatan as $c)
                        <tr>
                            <td>{{ $c->tujuan }}</td>
                            <td>{{ $c->tanggal }}</td>
                            <td>{{ $c->keterangan }}</td>
                            <td>
                                @if($c->anggaran)
                                    Rp {{ number_format($c->anggaran->jumlah, 0, ',', '.') }}
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Belum ada catatan perjalanan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Add loading animation to button on form submit
        document.querySelector('form').addEventListener('submit', function(e) {
            const button = document.querySelector('.btn-primary');
            button.classList.add('loading');
            button.querySelector('span').textContent = 'Menyimpan...';
        });

        // Auto-format number input
        const numberInput = document.querySelector('input[type="number"]');
        if (numberInput) {
            numberInput.addEventListener('input', function(e) {
                // Remove non-numeric characters except decimal point
                let value = this.value.replace(/[^\d]/g, '');
                this.value = value;
            });

            numberInput.addEventListener('blur', function(e) {
                if (this.value) {
                    // Format with thousand separators for display
                    const formatted = parseInt(this.value).toLocaleString('id-ID');
                    this.setAttribute('data-display', formatted);
                }
            });
        }

        // Enhanced table interactions
        document.querySelectorAll('tbody tr').forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.style.transform = 'translateX(4px)';
            });
            
            row.addEventListener('mouseleave', function() {
                this.style.transform = 'translateX(0)';
            });
        });

        // Form validation feedback
        const inputs = document.querySelectorAll('input[required], textarea[required]');
        inputs.forEach(input => {
            input.addEventListener('blur', function() {
                if (this.value.trim() === '') {
                    this.style.borderColor = 'rgba(239, 68, 68, 0.5)';
                } else {
                    this.style.borderColor = 'rgba(34, 197, 94, 0.3)';
                }
            });

            input.addEventListener('input', function() {
                if (this.style.borderColor.includes('239, 68, 68')) {
                    this.style.borderColor = 'rgba(99, 102, 241, 0.2)';
                }
            });
        });
    </script>

</body>
</html>