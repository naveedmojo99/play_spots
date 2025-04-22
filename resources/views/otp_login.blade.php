<!DOCTYPE html>
<html>
<head>
    <title>OTP Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { font-family: Arial, sans-serif; padding: 40px; background-color: #f5f5f5; }
        form { background: white; padding: 20px; max-width: 400px; margin: auto; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        input[type="text"], button { width: 95%; padding: 10px; margin: 10px 0; border-radius: 4px; border: 1px solid #ccc; }
        button { background-color: #4CAF50; color: white; border: none; cursor: pointer; width: 100%; }
        button:hover { background-color: #45a049; }
        .error { color: red; font-size: 0.9em; margin-top: -8px; margin-bottom: 10px; }
        .alert { background-color: #f8d7da; padding: 10px; border: 1px solid #f5c6cb; border-radius: 4px; color: #721c24; margin-bottom: 15px; }
    </style>
</head>
<body>

    <h2 style="text-align: center;">OTP Login</h2>

    <form method="POST" action="{{ route('otp.request') }}">
        @csrf

    
        <label for="name">Name (optional):</label>
        <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter your name">
        @error('name')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="mobile">Mobile Number:</label>
        <input type="text" name="mobile" value="{{ old('mobile') }}" placeholder="Enter your 10-digit mobile number" required>
        @error('mobile')
            <div class="error">{{ $message }}</div>
        @enderror

        <button type="submit">Request OTP</button>
    </form>

</body>
</html>
