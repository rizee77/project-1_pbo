<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Catatan Admin</title>
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
            padding: 2rem 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
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

        /* Form Container */
        .form-container {
            background: rgba(30, 30, 46, 0.9);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 3rem 2.5rem;
            box-shadow: 
                0 25px 50px -12px rgba(0, 0, 0, 0.4),
                0 0 0 1px rgba(99, 102, 241, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.05);
            width: 100%;
            max-width: 600px;
            position: relative;
            transition: all 0.3s ease;
        }

        .form-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(99, 102, 241, 0.6), transparent);
            border-radius: 20px 20px 0 0;
        }

        .form-container:hover {
            transform: translateY(-2px);
            box-shadow: 
                0 32px 64px -12px rgba(0, 0, 0, 0.5),
                0 0 0 1px rgba(99, 102, 241, 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
        }

        /* Form Title */
        .form-title {
            font-size: 1.875rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 2rem;
            background: linear-gradient(135deg, #e2e8f0 0%, #a5b4fc 50%, #c7d2fe 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
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

        /* Input fields */
        input[type="text"],
        input[type="date"],
        input[type="number"],
        select,
        textarea {
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid rgba(99, 102, 241, 0.2);
            border-radius: 10px;
            padding: 1rem 1.25rem;
            font-size: 0.95rem;
            color: #e2e8f0;
            transition: all 0.3s ease;
            outline: none;
            font-family: inherit;
        }

        input[type="text"]::placeholder,
        input[type="number"]::placeholder,
        textarea::placeholder {
            color: #94a3b8;
        }

        input[type="text"]:focus,
        input[type="date"]:focus,
        input[type="number"]:focus,
        select:focus,
        textarea:focus {
            border-color: rgba(99, 102, 241, 0.5);
            box-shadow: 
                0 0 0 3px rgba(99, 102, 241, 0.1),
                0 4px 6px -1px rgba(0, 0, 0, 0.1);
            background: rgba(15, 23, 42, 0.8);
            transform: translateY(-2px);
        }

        /* Select styling */
        select {
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 0.75rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 2.5rem;
        }

        select option {
            background: #1e1e2e;
            color: #e2e8f0;
            padding: 0.5rem;
        }

        /* Textarea styling */
        textarea {
            resize: vertical;
            min-height: 100px;
            font-family: inherit;
        }

        /* Button */
        button[type="submit"] {
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 50%, #a855f7 100%);
            border: none;
            border-radius: 12px;
            padding: 1rem 2rem;
            font-size: 1rem;
            font-weight: 600;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            margin-top: 1rem;
            box-shadow: 
                0 4px 6px -1px rgba(99, 102, 241, 0.3),
                0 2px 4px -1px rgba(99, 102, 241, 0.1);
        }

        button[type="submit"]::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        button[type="submit"]:hover {
            transform: translateY(-2px);
            box-shadow: 
                0 10px 20px -5px rgba(99, 102, 241, 0.4),
                0 4px 6px -1px rgba(99, 102, 241, 0.2);
        }

        button[type="submit"]:hover::before {
            left: 100%;
        }

        button[type="submit"]:active {
            transform: translateY(0);
        }

        /* Form grid for larger screens */
        @media (min-width: 768px) {
            .form-grid {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 1.5rem;
            }

            .form-grid .full-width {
                grid-column: 1 / -1;
            }
        }

        /* Responsive */
        @media (max-width: 640px) {
            body {
                padding: 1rem;
            }

            .form-container {
                padding: 2rem 1.5rem;
            }

            .form-title {
                font-size: 1.5rem;
            }

            input[type="text"],
            input[type="date"],
            input[type="number"],
            select,
            textarea {
                padding: 0.875rem 1rem;
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
            width: 20px;
            height: 20px;
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

        /* Validation states */
        .invalid {
            border-color: rgba(239, 68, 68, 0.5) !important;
            box-shadow: 0 0 0 2px rgba(239, 68, 68, 0.1) !important;
        }

        .valid {
            border-color: rgba(34, 197, 94, 0.5) !important;
            box-shadow: 0 0 0 2px rgba(34, 197, 94, 0.1) !important;
        }

        /* Enhanced select styling */
        select:focus {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236366f1' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
        }

        /* Smooth transitions for all form elements */
        input, select, textarea, button {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="form-title">Tambah Catatan Perjalanan</div>
        
        <form action="{{ route('admin.catatan.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label>Pegawai</label>
                <select name="user_id" required>
                    <option value="">-- Pilih Pegawai --</option>
                    @foreach($pegawaiList as $pegawai)
                        <option value="{{ $pegawai->id }}">
                            {{ $pegawai->name }} — {{ $pegawai->email }}
                        </option>
                    @endforeach
                </select>
            </div>

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
                    <input type="number" name="jumlah_anggaran" class="form-control" placeholder="0" required min="0">
                </div>
            </div>

            <div class="mb-3">
                <label>Keterangan</label>
                <textarea name="keterangan" placeholder="Deskripsi perjalanan (opsional)"></textarea>
            </div>

            <div class="mb-3">
                <label>Keterangan Anggaran</label>
                <textarea name="keterangan_anggaran" class="form-control" placeholder="Detail penggunaan anggaran (opsional)"></textarea>
            </div>

            <button type="submit">Simpan</button>
        </form>
    </div>

    <script>
        // Add loading animation to button on form submit
        document.querySelector('form').addEventListener('submit', function(e) {
            const button = document.querySelector('button[type="submit"]');
            button.classList.add('loading');
            button.textContent = 'Menyimpan...';
        });

        // Form validation
        const requiredFields = document.querySelectorAll('[required]');
        requiredFields.forEach(field => {
            field.addEventListener('blur', function() {
                if (this.value.trim() === '' || (this.tagName === 'SELECT' && this.value === '')) {
                    this.classList.add('invalid');
                    this.classList.remove('valid');
                } else {
                    this.classList.add('valid');
                    this.classList.remove('invalid');
                }
            });

            field.addEventListener('input', function() {
                if (this.classList.contains('invalid')) {
                    this.classList.remove('invalid');
                }
                if (this.value.trim() !== '' && (this.tagName !== 'SELECT' || this.value !== '')) {
                    this.classList.add('valid');
                }
            });
        });

        // Number formatting for currency input
        const currencyInput = document.querySelector('input[type="number"]');
        if (currencyInput) {
            currencyInput.addEventListener('input', function(e) {
                // Remove non-numeric characters
                let value = this.value.replace(/[^\d]/g, '');
                this.value = value;
            });

            currencyInput.addEventListener('blur', function(e) {
                if (this.value && this.value > 0) {
                    // You can add currency formatting here if needed
                    console.log('Amount:', this.value);
                }
            });
        }

        // Enhanced select interactions
        const selectElement = document.querySelector('select');
        if (selectElement) {
            selectElement.addEventListener('change', function() {
                if (this.value !== '') {
                    this.classList.add('valid');
                    this.classList.remove('invalid');
                }
            });
        }

        // Auto-resize textareas
        const textareas = document.querySelectorAll('textarea');
        textareas.forEach(textarea => {
            textarea.addEventListener('input', function() {
                this.style.height = 'auto';
                this.style.height = Math.max(100, this.scrollHeight) + 'px';
            });
        });

        // Focus management
        const formElements = document.querySelectorAll('input, select, textarea');
        formElements.forEach((element, index) => {
            element.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' && this.tagName !== 'TEXTAREA') {
                    e.preventDefault();
                    const nextElement = formElements[index + 1];
                    if (nextElement) {
                        nextElement.focus();
                    } else {
                        document.querySelector('button[type="submit"]').focus();
                    }
                }
            });
        });
    </script>
</body>
</html>