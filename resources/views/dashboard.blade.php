<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body { 
            font-family: 'Poppins', sans-serif; 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f4f8;
            margin: 0;
        }
        .container {
            text-align: center;
            background-color: #fff;
            padding: 50px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        .success-message {
            color: #2d3748;
            font-size: 24px;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="container">
        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
            <p style="color: #718096;">Anda telah berhasil login!</p>
        @else
            <p>Akses ditolak.</p>
        @endif
    </div>
</body>
</html>
