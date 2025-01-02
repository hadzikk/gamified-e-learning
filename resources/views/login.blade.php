<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }
        .panel {
            background: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        .panel h2 {
            font-size: 2rem;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            font-size: 1rem;
            color: #555;
            display: block;
            margin-bottom: 6px;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            box-sizing: border-box;
        }
        .form-group input:focus {
            border-color: #6366f1;
            outline: none;
            box-shadow: 0 0 4px rgba(99, 102, 241, 0.5);
        }
        .btn {
            display: block;
            width: 100%;
            padding: 12px;
            background-color: #6366f1;
            color: #fff;
            font-size: 1rem;
            font-weight: bold;
            text-align: center;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #4f46e5;
        }
        .text-center {
            text-align: center;
            font-size: 0.9rem;
            color: #555;
            margin-top: 20px;
        }
        .text-center a {
            color: #6366f1;
            text-decoration: none;
            font-weight: bold;
        }
        .text-center a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="panel">
        <h2>Login</h2>
        @if($errors->any())
            <div class="alert lert-danger">
                <ul>
                    @forEach($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('login.submit') }}" method="POST">
            @csrf
            <!-- Email -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" vlaue ="{{ Session::get('email') }}" name="email" id="email" placeholder="Enter your email" required>
            </div>
            <!-- Password -->
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter your password" required>
            </div>
            <!-- Tombol Login -->
            <button type="submit" class="btn">Login</button>
        </form>
        <!-- Tautan Register -->
        <p class="text-center">
            Belum punya akun? Silahkan klik 
            <a href="{{}}">Register</a>
        </p>
    </div>
</body>
</html>
