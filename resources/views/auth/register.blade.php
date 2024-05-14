<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/cb0709d530.js" crossorigin="anonymous"></script>
</head>
<style>
    .register-title {
        font-size: 32px;
        color: #007bff;
        /* Warna teks */
        margin-bottom: 30px;
        text-align: center;
    }
</style>

<body>

    <section class="vh-100">
        <div class="container h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card shadow-lg">
                        <div class="card-body p-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                    <h1 class="register-title">REGISTRASION FORM</h1>


                                    <form class="mx-1 mx-md-4" action="{{ route('store') }}" method="POST">
                                        @csrf
                                        <div class="mb-4">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                <input type="text" id="name" name="name" value="{{ old('name') }}"
                                                    class="form-control" placeholder="Your Name" />
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                <input type="email" id="email" name="email" value="{{ old('email') }}"
                                                    class="form-control" placeholder="Your Email" />
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                                <input type="password" id="password" name="password"
                                                    class="form-control" placeholder="Password" />
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                                                <input type="password" id="password_confirmation"
                                                    name="password_confirmation" class="form-control"
                                                    placeholder="Repeat your password" />
                                            </div>
                                        </div>

                                        <div class="d-grid gap-2">
                                            <input type="submit" class="btn btn-primary btn-lg" value="Register">
                                        </div>

                                        <div class="mt-3 text-center">
                                            <p>Already have an account?<a href="{{ route('login') }}"
                                                    class="text-primary"> Sign in here</a></p>
                                        </div>

                                    </form>

                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                                        class="img-fluid" alt="Sample image">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-42mS9Sh3FlRj5v8/Xz2Uthermsu7Ml6zNpJoW+tkJSTNQ5cKhVV/nDAe8okvfQrx"
        crossorigin="anonymous"></script>
</body>

</html>