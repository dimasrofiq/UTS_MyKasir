<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Custom Styles */
        body {
            background-color: #f8f9fa;
            /* Background color */
            font-family: Arial, sans-serif;
            /* Font family */
        }

        .login-container {
            padding: 50px;
            margin-top: 50px;
        }

        .login-form {
            background-color: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        }

        .login-title {
            font-size: 32px;
            color: #007bff;
            /* Text color */
            margin-bottom: 30px;
            text-align: center;
        }

        .login-img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto 30px;
            /* Center image */
            border-radius: 8px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        }

        .form-control {
            border-radius: 20px;
            margin-bottom: 20px;
            /* Spacing between input fields */
        }

        .form-check-input {
            margin-top: 5px;
        }

        .btn-primary {
            background-color: #007bff;
            /* Primary button color */
            border: none;
            border-radius: 20px;
            font-size: 18px;
            font-weight: bold;
            transition: background-color 0.3s ease;
            width: 100%;
            /* Make the button full width */
        }

        .btn-primary:hover {
            background-color: #0056b3;
            /* Button color on hover */
        }

        .mt-3 {
            text-align: center;
        }

        .mt-3 a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .mt-3 a:hover {
            color: #0056b3;
            /* Link color on hover */
        }
    </style>
</head>

<body>
    <div class="container login-container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <div class="login-form">
                    <h1 class="login-title">LOGIN FORM</h1>
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                        class="login-img" alt="Sample image">
                    <form action="{{ route('authenticate') }}" method="post">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control"
                                placeholder="Enter your email address">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control"
                                placeholder="Enter your password">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember_me">
                            <label class="form-check-label" for="remember_me">Remember me</label>
                        </div>
                        <button type="submit" value="Login" class="btn btn-primary btn-lg">Login</button>
                        <p class="mt-3">Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>