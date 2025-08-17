<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: #343a40;
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        main {
            padding: 30px;
        }
        .btn {
            background-color: #dc3545;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            font-size: 14px;
        }
        .btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <header>
        <h2>Dashboard</h2>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn">Logout</button>
        </form>
    </header>
    <main>
        <h3>Selamat datang, {{ Auth::user()->name }}!</h3>
        <p>Email: {{ Auth::user()->email }}</p>
        <p>Role: {{ Auth::user()->role }}</p>
    </main>
</body>
</html>
