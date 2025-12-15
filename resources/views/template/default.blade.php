<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Workshop HTML</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css" />
    <style>
        body {
            font-family: "Sarabun", sans-serif;
        }
    </style>

</head>

<body>
    <div class="container">
        <h1>template/default.blade.php</h1>
        @yield('content')
    </div>
    @stack('scripts')
</body>

</html>
