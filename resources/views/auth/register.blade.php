<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
            display: flex;
            justify-content: center;
            align-items: center;
            color: #e2e8f0;
            position: relative;
            overflow: hidden;
            padding: 2rem 1rem;
        }

        /* Animated background elements */
        body::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle at 30% 20%, rgba(99, 102, 241, 0.1) 0%, transparent 50%),
                        radial-gradient(circle at 70% 80%, rgba(147, 51, 234, 0.08) 0%, transparent 50%),
                        radial-gradient(circle at 20% 70%, rgba(59, 130, 246, 0.06) 0%, transparent 50%);
            animation: float 20s ease-in-out infinite;
            pointer-events: none;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            33% { transform: translate(-20px, -20px) rotate(120deg); }
            66% { transform: translate(20px, -10px) rotate(240deg); }
        }

        .card {
            background: rgba(30, 30, 46, 0.9);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 3rem 2.5rem;
            box-shadow: 
                0 25px 50px -12px rgba(0, 0, 0, 0.4),
                0 0 0 1px rgba(99, 102, 241, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.05);
            width: 100%;
            max-width: 440px;
            position: relative;
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
            border-radius: 24px 24px 0 0;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 
                0 32px 64px -12px rgba(0, 0, 0, 0.5),
                0 0 0 1px rgba(99, 102, 241, 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 2rem;
            font-size: 1.875rem;
            font-weight: 700;
            background: linear-gradient(135deg, #e2e8f0 0%, #a5b4fc 50%, #c7d2fe 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .alert {
            margin-bottom: 1rem;
            padding: 0.75rem;
            border-radius: 12px;
            border: 1px solid;
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

        .alert-danger {
            background: rgba(239, 68, 68, 0.1);
            border-color: rgba(239, 68, 68, 0.3);
            color: #fca5a5;
        }

        .alert-success {
            background: rgba(34, 197, 94, 0.1);
            border-color: rgba(34, 197, 94, 0.3);
            color: #86efac;
        }

        .alert strong {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .alert ul {
            margin-bottom: 0;
            padding-left: 1.25rem;
            list-style: none;
        }

        .alert li {
            position: relative;
            padding-left: 0.5rem;
        }

        .alert li::before {
            content: '•';
            position: absolute;
            left: -0.5rem;
            color: currentColor;
            font-weight: bold;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 1.25rem;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid rgba(99, 102, 241, 0.2);
            border-radius: 12px;
            padding: 1rem 1.25rem;
            font-size: 1rem;
            color: #e2e8f0;
            transition: all 0.3s ease;
            outline: none;
        }

        input[type="text"]::placeholder,
        input[type="email"]::placeholder,
        input[type="password"]::placeholder {
            color: #94a3b8;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: rgba(99, 102, 241, 0.5);
            box-shadow: 
                0 0 0 3px rgba(99, 102, 241, 0.1),
                0 4px 6px -1px rgba(0, 0, 0, 0.1);
            background: rgba(15, 23, 42, 0.8);
            transform: translateY(-1px);
        }

        /* Special styling for password confirmation */
        input[name="password_confirmation"] {
            position: relative;
        }

        input[name="password_confirmation"]:valid {
            border-color: rgba(34, 197, 94, 0.3);
        }

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
            margin-top: 0.5rem;
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

        button span {
            position: relative;
            z-index: 1;
        }

        .link {
            text-align: center;
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(99, 102, 241, 0.1);
        }

        .link p {
            color: #94a3b8;
            font-size: 0.95rem;
        }

        .link a {
            color: #a5b4fc;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            position: relative;
        }

        .link a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 1px;
            bottom: -2px;
            left: 0;
            background: linear-gradient(90deg, #a5b4fc, #c7d2fe);
            transition: width 0.3s ease;
        }

        .link a:hover {
            color: #c7d2fe;
            text-shadow: 0 0 8px rgba(165, 180, 252, 0.5);
        }

        .link a:hover::after {
            width: 100%;
        }

        /* Responsive */
        @media (max-width: 480px) {
            body {
                padding: 1rem;
            }
            
            .card {
                padding: 2rem 1.5rem;
                max-width: 100%;
            }
            
            h2 {
                font-size: 1.5rem;
            }

            form {
                gap: 1rem;
            }

            input[type="text"],
            input[type="email"],
            input[type="password"] {
                padding: 0.875rem 1rem;
            }
        }

        /* Loading animation for button */
        .loading {
            pointer-events: none;
            opacity: 0.7;
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

        /* Form validation visual feedback */
        .form-group {
            position: relative;
        }

        .form-group input:valid {
            border-color: rgba(34, 197, 94, 0.3);
        }

        .form-group input:invalid:not(:placeholder-shown) {
            border-color: rgba(239, 68, 68, 0.3);
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>Daftar Akun</h2>

        {{-- Alert Error --}}
        @if ($errors->any())
            <div class="alert alert-danger" style="margin-bottom: 1rem; padding: 0.75rem; border-radius: 4px;">
                <strong>Terjadi kesalahan:</strong>
                <ul style="margin-bottom: 0; padding-left: 1.25rem;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Alert Success (jika redirect dari register ke login juga ingin tampilkan sukses) --}}
        @if (session('success'))
            <div class="alert alert-success" style="margin-bottom: 1rem; padding: 0.75rem; border-radius: 4px; background-color: #d4edda; color: #155724;">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <input type="text" name="name" placeholder="Nama Lengkap" value="{{ old('name') }}" required>
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>
            <button type="submit"><span>Daftar</span></button>
        </form>

        <div class="link">
            <p>Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></p>
        </div>
    </div>

    <script>
        // Add loading animation to button on form submit
        document.querySelector('form').addEventListener('submit', function(e) {
            const button = document.querySelector('button[type="submit"]');
            button.classList.add('loading');
            button.querySelector('span').textContent = 'Mendaftar...';
        });

        // Add smooth focus transitions
        const inputs = document.querySelectorAll('input');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('focused');
            });
        });

        // Password confirmation visual feedback
        const password = document.querySelector('input[name="password"]');
        const confirmPassword = document.querySelector('input[name="password_confirmation"]');

        function checkPasswordMatch() {
            if (confirmPassword.value && password.value) {
                if (password.value === confirmPassword.value) {
                    confirmPassword.style.borderColor = 'rgba(34, 197, 94, 0.5)';
                    confirmPassword.style.boxShadow = '0 0 0 2px rgba(34, 197, 94, 0.1)';
                } else {
                    confirmPassword.style.borderColor = 'rgba(239, 68, 68, 0.5)';
                    confirmPassword.style.boxShadow = '0 0 0 2px rgba(239, 68, 68, 0.1)';
                }
            } else {
                confirmPassword.style.borderColor = '';
                confirmPassword.style.boxShadow = '';
            }
        }

        password.addEventListener('input', checkPasswordMatch);
        confirmPassword.addEventListener('input', checkPasswordMatch);
    </script>
</body>
</html>