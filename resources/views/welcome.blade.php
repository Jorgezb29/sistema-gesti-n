<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido - Sistema de Gestión de Documentos</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f4f7fa;
        }

        .container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 40px;
            text-align: center;
            width: 100%;
            max-width: 400px;
        }

        h1 {
            font-size: 2.5rem;
            font-weight: 600;
            color: #333;
        }

        p {
            font-size: 1.125rem;
            color: #555;
            margin-top: 16px;
        }

        .cta-buttons a {
            display: inline-block;
            margin-top: 24px;
            padding: 12px 24px;
            border-radius: 8px;
            text-align: center;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .cta-buttons .login-btn {
            background-color: #4CAF50;
            color: white;
        }

        .cta-buttons .login-btn:hover {
            background-color: #45a049;
        }

        .cta-buttons .register-btn {
            background-color: #1D72B8;
            color: white;
        }

        .cta-buttons .register-btn:hover {
            background-color: #0f6eb3;
        }

        .cta-buttons .dashboard-btn {
            background-color: #1E40AF;
            color: white;
        }

        .cta-buttons .dashboard-btn:hover {
            background-color: #1e3b8f;
        }
    </style>
</head>

<body class="antialiased">
    <div class="container">
        <div class="card">
            <h1>Bienvenido al Sistema de Gestión de Documentos</h1>
            <p>Gestiona tus documentos de manera eficiente y segura.</p>

            @auth
                <div class="cta-buttons">
                    <a href="{{ route('home') }}" class="dashboard-btn">Ir al Dashboard</a>
                </div>
            @else
                <div class="cta-buttons">
                    <a href="{{ route('login') }}" class="login-btn">Iniciar sesión</a>
                    <a href="{{ route('register') }}" class="register-btn">Registrarse</a>
                </div>
            @endauth
        </div>
    </div>
</body>

</html>
