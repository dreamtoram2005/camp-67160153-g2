<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="utf-8" />
    <title>Pokedex Master</title>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
    <style>
        body { 
            font-family: 'Kanit', sans-serif; 
            background: #f0f2f5; /* สีพื้นหลังเทาอ่อน */
            min-height: 100vh;
        }
        .main-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .gradient-header {
            background: linear-gradient(45deg, #FF512F 0%, #DD2476 100%); /* ไล่เฉดสีส้ม-แดง */
            color: white;
            border: none;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        @yield('content')
    </div>
</body>
</html>