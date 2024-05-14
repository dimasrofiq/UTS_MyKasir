@extends('auth.header')

@section('content')

<br><br>
<header class="container-header mb-4"
    style="background-color: #003049; color: white; padding: 20px; border-radius: 15px; box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);">
    <h2 class="text-white">Form Edit Karyawan</h2>
</header>

<div class="container rounded-3" style="background-color: #003049; padding-top: 5%; padding-bottom: 5%;">
    <div class="row">
        <div class="col-lg-5 order-lg-2">
            <div class="contact-info__wrapper gradient-brand-color p-5 shadow-lg">
                <div class="alert alert-dark" role="alert">
                    <span class="text-black">Pastikan data karyawan yang Anda input telah benar dan sesuai
                        ketentuan!</span>
                </div>
                <ul class="contact-info__list list-unstyled position-relative z-index-101">
                    <li class="mb-4 ps-4 text-white">
                        <i class="fas fa-user me-2"></i> Nama Karyawan minimal 3 karakter.
                    </li>
                    <li class="mb-4 ps-4 text-white">
                        <i class="fas fa-envelope me-2"></i> Email harus valid.
                    </li>
                    <li class="mb-4 ps-4 text-white">
                        <i class="fas fa-key me-2"></i> Password minimal 8 karakter dan maksimal 16 karakter.
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-7 order-lg-1">
            <div class="contact-form__wrapper p-5 shadow-lg">
                <form action="{{ route('karyawan.update', $users->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="mb-4">
                        <label class="required-field text-white" for="name">Nama Karyawan</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ old('name', $users->name) }}" placeholder="Nama Karyawan" required>
                    </div>
                    <div class="mb-4">
                        <label class="required-field text-white" for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ old('email', $users->email) }}" placeholder="Karyawan@example.com" required>
                    </div>
                    <div class="mb-4">
                        <label class="required-field text-white" for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Password">
                    </div>
                    <div class="mb-4">
                        <label class="required-field text-white" for="password_confirmation">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="password_confirmation"
                            name="password_confirmation" placeholder="Konfirmasi Password">
                    </div>
                    <div class="mb-4">
                        <button type="submit" name="update" class="btn btn-success me-3">Update</button>
                        <a class="btn btn-secondary" href="{{ route('karyawan.index') }}">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection