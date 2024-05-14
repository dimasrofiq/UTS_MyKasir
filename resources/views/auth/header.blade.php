<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/cb0709d530.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <style>
        .table-responsive {
            max-height: 500px;
            overflow: scroll;
        }

        .img-t {
            width: 71px;
            aspect-ratio: 2 / 2;
            object-fit: cover;
            border-radius: 50%;
        }

        .d-flex {
            margin-top: 15px;
        }

        .bg-custom {
            background-color: #003049;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-custom">

        <div class="container">
            <!-- Site Logo Here -->
            <a class="navbar-brand" href="{{ route('dashboard') }}" style="margin-right:15%;"> <i
                    class="fa-sharp fa-solid fa-cash-register"></i>
                MyKasir</a>
            <!-- Mobile Toggle Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMobileToggle"
                aria-controls="navbarMobileToggle" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarMobileToggle">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::route()->named('dashboard') ? 'active' : '' }}"
                            href="{{ route('dashboard') }}">
                            <i class="fa-solid fa-home"></i> Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Request::route()->named('karyawan.index') ? 'active' : '' }}"
                            href="{{ route('karyawan.index') }}">
                            <i class="fa-sharp fa-solid fa-user-tie"></i> Karyawan
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Request::route()->named('produk.index') ? 'active' : '' }}"
                            href="{{ route('produk.index') }}">
                            <i class="fa-sharp fa-solid fa-boxes-stacked"></i> Produk
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Request::route()->named('member.index') ? 'active' : '' }}"
                            href="{{ route('member.index') }}">
                            <i class="fa-sharp fa-solid fa-crown"></i> Pelanggan
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Request::route()->named('penjualan.index') ? 'active' : '' }}"
                            href="{{ route('penjualan.index') }}">
                            <i class="fa-solid fa-clipboard-list"></i> Penjualan
                        </a>
                    </li>






                </ul>

                <!-- Right Side -->
                <div class="dropdown">
                    <a href="#" class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-sharp fa-solid fa-user-tie"></i> Profil
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                        <li><a href="#" class="dropdown-item"><i class="fa-sharp fa-solid fa-key"></i> Change
                                Password</a></li>
                        <li><a href="#" class="dropdown-item"><i class="fa-sharp fa-solid fa-user-gear"></i> Admin
                                Section</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item"><i
                                        class="fa-sharp fa-solid fa-right-from-bracket"></i> Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>




    <div class="container">
        @yield('content')
    </div>