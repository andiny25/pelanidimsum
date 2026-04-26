<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Pelani Dimsum</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #FFA07A, #FFC1CC);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .register-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        .register-container h2 {
            margin-bottom: 20px;
            font-size: 26px;
            color: #FF6347;
        }

        .register-container form input {
            margin: 10px 0;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            width: 100%; /* Membuat semua input menyesuaikan ukuran container */
            box-sizing: border-box; /* Memastikan padding tidak melebihi lebar */
        }

        .register-container form button {
            margin-top: 10px;
            padding: 12px;
            background-color: #32CD32;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            width: 100%; /* Sama besar dengan input lainnya */
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .register-container form button:hover {
            background-color: #28a745; /* Warna hijau lebih gelap saat hover */
        }

        .register-container .login-link {
            margin-top: 15px;
        }

        .register-container .login-link a {
            color: #FF6347;
            text-decoration: none;
        }
    </style>

</head>

<body>
    <div class="register-container">
        <h2>Registrasi Pelani Dimsum</h2>

        <form action='/login' method="POST">
            @csrf
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>
            <button type="submit">Daftar</button>

        <div class="login-link">
            <p>Sudah punya akun? <a href="{{ url('/login') }}">Login di sini</a></p>
        </div>
    </div>
</body>

</html>
