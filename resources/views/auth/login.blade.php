<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - NYCHA Project</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        :root {
            --primary-color: #d92231;
            --primary-hover: #b01c28;
            --secondary-color: #2D3748;
            --background-light: #f8f9fa;
            --text-dark: #333;
            --text-light: #718096;
            --border-color: #e2e8f0;
            --white: #fff;
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        
        body {
            font-family: 'Roboto', sans-serif;
            background-color: var(--background-light);
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .login-container {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            margin: 0 15px;
        }
        
        .login-logo {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .login-logo img {
            height: 80px;
        }
        
        .login-card {
            background-color: var(--white);
            border-radius: 8px;
            box-shadow: var(--shadow);
            padding: 30px;
            margin-bottom: 20px;
        }
        
        .login-header {
            text-align: center;
            margin-bottom: 25px;
        }
        
        .login-header h1 {
            font-size: 24px;
            font-weight: 700;
            color: var(--text-dark);
            margin: 0;
        }
        
        .login-header p {
            font-size: 14px;
            color: var(--text-light);
            margin-top: 10px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: 500;
            color: var(--text-dark);
            margin-bottom: 5px;
        }
        
        .form-control {
            width: 100%;
            padding: 12px 15px;
            font-size: 14px;
            border: 1px solid var(--border-color);
            border-radius: 4px;
            transition: border-color 0.3s;
        }
        
        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px rgba(217, 34, 49, 0.2);
        }
        
        .form-control.is-invalid {
            border-color: var(--primary-color);
        }
        
        .invalid-feedback {
            display: block;
            font-size: 12px;
            color: var(--primary-color);
            margin-top: 5px;
        }
        
        .form-check {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .form-check-input {
            margin-right: 10px;
            width: 16px;
            height: 16px;
        }
        
        .form-check-label {
            font-size: 14px;
            color: var(--text-light);
        }
        
        .login-button {
            width: 100%;
            padding: 12px 15px;
            font-size: 16px;
            font-weight: 500;
            background-color: var(--primary-color);
            color: var(--white);
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .login-button:hover {
            background-color: var(--primary-hover);
        }
        
        .login-footer {
            text-align: center;
            font-size: 14px;
            color: var(--text-light);
        }
        
        .login-footer a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
        }
        
        .login-footer a:hover {
            text-decoration: underline;
        }
        
        .back-to-site {
            text-align: center;
            margin-top: 20px;
        }
        
        .back-to-site a {
            display: inline-flex;
            align-items: center;
            color: var(--text-light);
            font-size: 14px;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .back-to-site a i {
            margin-right: 5px;
        }
        
        .back-to-site a:hover {
            color: var(--primary-color);
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-logo">
            <img src="{{ asset('images/logo.png') }}" alt="NYCHA Project Logo">
        </div>
        
        <div class="login-card">
            <div class="login-header">
                <h1>Dashboard Login</h1>
                <p>Enter your credentials to access the dashboard</p>
            </div>
            
            @if ($errors->any())
                <div class="form-group">
                    <div class="alert alert-danger">
                        <ul style="margin: 0; padding: 0 0 0 20px; color: var(--primary-color);">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            
            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        Remember Me
                    </label>
                </div>
                
                <button type="submit" class="login-button">
                    Login
                </button>
            </form>
        </div>
        
        <div class="back-to-site">
            <a href="{{ url('/') }}">
                <i class="fas fa-arrow-left"></i> Back to Website
            </a>
        </div>
    </div>
</body>
</html>
