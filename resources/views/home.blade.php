<!DOCTYPE html>
<html>
<head>
    <title>User Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { font-family: Arial, sans-serif; background: #f2f2f2; padding: 40px; }
        .container { background: white; max-width: 500px; margin: auto; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h2 { text-align: center; }
        p { font-size: 18px; margin: 10px 0; }
        form { text-align: center; margin-top: 20px; }
        button { background-color: #e74c3c; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; }
        button:hover { background-color: #c0392b; }
    </style>
</head>
<body>

    <div class="container">
        <h2>Welcome, {{ Auth::user()->name }}</h2>

        <p><strong>Mobile:</strong> {{ Auth::user()->mobile }}</p>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>

</body>
</html>
