<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Catatan Perjalanan</title>
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
            align-items: center;
            justify-content: center;
        }

        /* Animated background elements */
        body::before {
            height: 200%;
            background: radial-gradient(circle at 30% 20%, rgba(99, 102, 241, 0.08) 0%, transparent 50%),
                        radial-gradient(circle at 70% 80%, rgba(147, 51, 234, 0.06) 0%, transparent 50%),
                        radial-gradient(circle at 20% 70%, rgba(59, 130, 246, 0.04) 0%, transparent 50%);
            animation: float 25s ease-in-out infinite;
            pointer-events: none;
            z-index: -1;
        }


        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 2rem;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        h1 {
            font-size: 2.5rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 3rem;
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 50%, #a855f7 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: 0 0 20px rgba(139, 92, 246, 0.3);
            letter-spacing: -0.02em;
        }

        form {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 3rem;
            box-shadow: 
                0 20px 25px -5px rgba(0, 0, 0, 0.3),
                0 10px 10px -5px rgba(0, 0, 0, 0.2),
                0 0 0 1px rgba(139, 92, 246, 0.1);
            border: 1px solid rgba(139, 92, 246, 0.2);
            position: relative;
            overflow: hidden;
        }

        form::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(139, 92, 246, 0.6), transparent);
        }

        .mb-3, .form-group {
            margin-bottom: 2rem;
            position: relative;
        }

        label {
            display: block;
            margin-bottom: 0.75rem;
            font-weight: 600;
            font-size: 0.95rem;
            color: #cbd5e1;
            letter-spacing: 0.025em;
            text-transform: uppercase;
            font-size: 0.8rem;
        }

        .form-control {
            width: 100%;
            padding: 1rem 1.25rem;
            background: rgba(15, 23, 42, 0.8);
            border: 1px solid rgba(139, 92, 246, 0.3);
            border-radius: 12px;
            color: #e2e8f0;
            font-size: 1rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(10px);
            font-family: inherit;
        }

        .form-control:focus {
            outline: none;
            border-color: #8b5cf6;
            box-shadow: 
                0 0 0 3px rgba(139, 92, 246, 0.1),
                0 0 20px rgba(139, 92, 246, 0.2);
            background: rgba(15, 23, 42, 0.95);
            transform: translateY(-1px);
        }

        .form-control::placeholder {
            color: #64748b;
        }

        select.form-control {
            cursor: pointer;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%23a855f7' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 1rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 3rem;
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }

        input[type="number"].form-control {
            -moz-appearance: textfield;
        }

        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .btn {
            padding: 0.875rem 2rem;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            position: relative;
            overflow: hidden;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-right: 1rem;
            margin-top: 1rem;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn-primary {
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 50%, #a855f7 100%);
            color: white;
            box-shadow: 
                0 4px 15px rgba(139, 92, 246, 0.4),
                0 0 20px rgba(139, 92, 246, 0.2);
            border: 1px solid rgba(139, 92, 246, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 
                0 8px 25px rgba(139, 92, 246, 0.5),
                0 0 30px rgba(139, 92, 246, 0.3);
            background: linear-gradient(135deg, #7c3aed 0%, #a855f7 50%, #c084fc 100%);
        }

        .btn-secondary {
            background: rgba(51, 65, 85, 0.8);
            color: #cbd5e1;
            border: 1px solid rgba(100, 116, 139, 0.3);
            backdrop-filter: blur(10px);
        }

        .btn-secondary:hover {
            background: rgba(71, 85, 105, 0.9);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        .form-floating {
            position: relative;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }

            form {
                padding: 2rem 1.5rem;
                border-radius: 16px;
            }

            h1 {
                font-size: 2rem;
                margin-bottom: 2rem;
            }

            .btn {
                width: 100%;
                margin-right: 0;
                margin-bottom: 1rem;
                justify-content: center;
            }
        }

        /* Glow animation for form elements */
        @keyframes glow {
            0%, 100% { box-shadow: 0 0 5px rgba(139, 92, 246, 0.2); }
            50% { box-shadow: 0 0 20px rgba(139, 92, 246, 0.4); }
        }

        .form-control:focus {
            animation: glow 2s ease-in-out infinite;
        }

        /* Subtle background animation */
        @keyframes backgroundShift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        body {
            background-size: 400% 400%;
            animation: backgroundShift 20s ease infinite;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Catatan Perjalanan</h1>

        <form action="{{ route('admin.catatan.update', $catatan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Pegawai</label>
                <select name="user_id" class="form-control" required>
                    @foreach($pegawaiList as $pegawai)
                        <option value="{{ $pegawai->id }}" {{ $catatan->user_id == $pegawai->id ? 'selected' : '' }}>
                            {{ $pegawai->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Tujuan</label>
                <input type="text" name="tujuan" class="form-control" value="{{ $catatan->tujuan }}" required>
            </div>

            <div class="mb-3">
                <label>Tanggal</label>
                <input type="date" name="tanggal" class="form-control" value="{{ $catatan->tanggal }}" required>
            </div>

            <div class="mb-3">
                <label>Keterangan</label>
                <textarea name="keterangan" class="form-control">{{ $catatan->keterangan }}</textarea>
            </div>

            <div class="form-group">
                <label>Jumlah Anggaran (Rp)</label>
                <input type="number" name="jumlah_anggaran" class="form-control" 
                    value="{{ $catatan->anggaran ? $catatan->anggaran->jumlah : 0 }}" min="0" required>
            </div>
            
            <div class="form-group">
                <label>Keterangan Anggaran</label>
                <textarea name="keterangan_anggaran" class="form-control">{{ $catatan->anggaran ? $catatan->anggaran->keterangan : '' }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('dashboard.admin') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>