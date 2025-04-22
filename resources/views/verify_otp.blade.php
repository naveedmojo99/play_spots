<!DOCTYPE html>
<html>
<head>
    <title>Verify OTP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { font-family: Arial, sans-serif; padding: 40px; background-color: #f5f5f5; }
        form { background: white; padding: 20px; max-width: 400px; margin: auto; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        input[type="text"], button { width: 90%; padding: 10px; margin: 10px 10px; border-radius: 4px; border: 1px solid #ccc; }
        button { background-color: #4CAF50; color: white; border: none; cursor: pointer; }
        button:hover { background-color: #45a049; }
    </style>
</head>
<body>

    <h2 style="text-align: center;">Verify OTP</h2>

    {{-- Display error message --}}
    @if (session('error'))
        <div style="background-color: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 15px; border-radius: 4px; border: 1px solid #f5c6cb;">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('otp.verify') }}">
        @csrf

        <input type="text" name="mobile" value="{{ $mobile }}">
        <input type="text" name="name" value="{{ $name }}">

        <label for="otp">Enter OTP:</label>
        <input type="text" name="otp" placeholder="Enter the OTP you received" required>

        <button type="submit">Verify OTP</button>
    </form>

</body>
</html>
