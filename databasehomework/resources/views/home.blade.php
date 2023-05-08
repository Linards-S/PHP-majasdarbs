<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    
</head>
<body>
    <h1>Welcome to our website!</h1>
    <img src="https://www.troublefreepool.com/media/hello-gif.3474/full" alt="Your GIF Description">
    <div class="buttons">
        <a href="{{ route('register') }}">Register</a>
        <a href="{{ route('login') }}">Login</a>
    </div>
</body>
</html>
