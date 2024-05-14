@extends('auth.header')

@section('content')

<br><br>
<header class="container-header mb-4"
    style="background-color: #003049; color: white; padding: 20px; border-radius: 15px; box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);">
    <h2 class="text-white">Tambah Pelanggan</h2>
</header>

<div class="container rounded-3" style="background-color: #003049; padding-top: 5%; padding-bottom: 5%;">
    <div class="row">
        <div class="col-lg-5 order-lg-2">
            <div class="contact-info__wrapper gradient-brand-color p-5 shadow-lg">
                <div class="alert alert-dark" role="alert">
                    <span class="text-black">Pastikan data Member yang Anda input telah benar dan sesuai!</span>
                </div>
                <ul class="contact-info__list list-unstyled position-relative z-index-101">
                    <li class="mb-4 ps-4 text-white">
                        <i class="fas fa-user me-2"></i> Nama Member Minimal 3 karakter
                    </li>
                    <li class="mb-4 ps-4 text-white">
                        <i class="fas fa-map-marker-alt me-2"></i> Alamat Member Lengkap
                    </li>
                    <li class="mb-4 ps-4 text-white">
                        <i class="fas fa-phone-alt me-2"></i> Nomor Telepon Handphone atau Rumah
                    </li>
                    <li class="mb-4 ps-4 text-white">
                        <a href="https://www.google.com/maps" target="_blank"
                            class="text-link link--right-icon text-white">Get directions <i
                                class="link__icon fa fa-directions"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-7 order-lg-1">
            <div class="contact-form__wrapper p-5 shadow-lg">
                <form action="{{ route('member.store') }}" method="POST" class="contact-form form-validate"
                    novalidate="novalidate">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-12 mb-4">
                            <div class="form-group">
                                <label class="required-field text-white" for="NamaPelanggan">Nama Member</label>
                                <input type="text" class="form-control" id="NamaPelanggan" name="NamaPelanggan"
                                    value="{{ old('NamaPelanggan') }}" placeholder="Masukkan Nama Member">
                            </div>
                        </div>

                        <div class="col-sm-12 mb-4">
                            <div class="form-group">
                                <label class="required-field text-white" for="Alamat">Alamat</label>
                                <textarea class="form-control" id="Alamat" name="Alamat" rows="4"
                                    placeholder="Masukkan Alamat Member"></textarea>
                            </div>
                        </div>

                        <div class="col-sm-12 mb-4">
                            <div class="form-group">
                                <label class="required-field text-white" for="NomorTelepon">Nomor Telepon</label>
                                <input type="tel" class="form-control" id="NomorTelepon" name="NomorTelepon"
                                    placeholder="Masukkan Nomor Telepon">
                            </div>
                        </div>

                        <div class="col-sm-12 mb-4">
                            <button type="submit" name="submit" class="btn btn-success">Tambah</button>
                            <a class="btn btn-secondary" href="{{ route('member.index') }}">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection