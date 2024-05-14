@extends('auth.layouts')
@section('content')

<br><br>
<header class="container-header mb-4"
    style="background-color: #003049; color: white; padding: 20px; border-radius: 15px; box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);">
    <h2 class="text-white">Edit Pelanggan</h2>
</header>

<div class="container rounded-3" style="background-color: #003049; padding-top: 5%; padding-bottom: 5%;">
    <div class="row">
        <div class="col-lg-5 order-lg-2">
            <div class="contact-info__wrapper gradient-brand-color p-5 shadow-lg">
                <div class="alert alert-dark" role="alert">
                    Pastikan data Member yang Anda ubah telah benar dan sesuai!
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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('member.update', $members->id)}}" method="POST"
                    class="contact-form form-validate" novalidate="novalidate">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-12 mb-3">
                            <div class="form-group">
                                <label class="required-field text-white" for="NamaPelanggan">Nama Member</label>
                                <input type="text" class="form-control" id="NamaPelanggan" name="NamaPelanggan"
                                    value="{{ old('NamaPelanggan', $members->NamaPelanggan) }}">
                            </div>
                        </div>

                        <div class="col-sm-12 mb-3">
                            <div class="form-group">
                                <label class="required-field text-white" for="Alamat">Alamat</label>
                                <textarea class="form-control" id="Alamat" name="Alamat"
                                    rows="4">{{ old('Alamat', $members->Alamat) }}</textarea>
                            </div>
                        </div>

                        <div class="col-sm-12 mb-3">
                            <div class="form-group">
                                <label class="required-field text-white" for="NomorTelepon">Nomor Telepon</label>
                                <input type="tel" class="form-control" id="NomorTelepon" name="NomorTelepon"
                                    value="{{ old('NomorTelepon', $members->NomorTelepon) }}">
                            </div>
                        </div>

                        <div class="col-sm-12 mb-3">
                            <br>
                            <button type="submit" name="submit" class="btn btn-primary">Update</button>
                            <a class="btn btn-primary" href="{{ route('member.index') }}">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection