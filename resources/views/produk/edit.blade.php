@extends('auth.header')
@section('content')

<br><br>
<header class="container-header mb-4"
    style="background-color: #003049; color: white; padding: 20px; border-radius: 15px; box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);">
    <h2 class="text-white">Form Edit Produk</h2>
</header>

<div class="container rounded-3" style="background-color: #003049; padding-top: 5%; padding-bottom: 5%;">
    <div class="row">
        <div class="col-lg-5 order-lg-2">
            <div class="contact-info__wrapper gradient-brand-color p-5 shadow-lg">
                <div class="alert alert-dark" role="alert">
                    <span class="text-black">Pastikan data produk yang anda Input telah benar dan sesuai
                        Ketentuan!</span>
                </div>
                <ul class="contact-info__list list-unstyled position-relative z-index-101">
                    <li class="mb-4 ps-4 text-white">
                        <i class="fas fa-image me-2"></i> Gambar harus berupa file dengan tipe: jpeg, png, jpg.
                    </li>
                    <li class="mb-4 ps-4 text-white">
                        <i class="fas fa-warehouse me-2"></i> Pastikan stok sesuai dengan data.
                    </li>
                    <li class="mb-4 ps-4 text-white">
                        <i class="fas fa-money-bill-wave me-2"></i> Cek harga yang anda masukan dengan teliti.
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-7 order-lg-1">
            <div class="contact-form__wrapper p-5 shadow-lg">
                <form action="{{ route('produk.update', $produks->id) }}" method="POST"
                    class="contact-form form-validate" novalidate enctype="multipart/form-data">
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
                        <label class="required-field text-white" for="NamaProduk">Nama Produk</label>
                        <input type="text" class="form-control" id="NamaProduk" name="NamaProduk"
                            value="{{ old('NamaProduk', $produks->NamaProduk) }}" placeholder="Nama Produk" required>
                    </div>
                    <div class="mb-4">
                        <label class="required-field text-white" for="Harga">Harga</label>
                        <input type="text" class="form-control" id="Harga" name="Harga"
                            value="{{ old('Harga', $produks->Harga) }}" placeholder="Rp 0.000" required>
                    </div>
                    <div class="mb-4">
                        <label class="required-field text-white" for="Stok">Stok Produk</label>
                        <input type="text" class="form-control" id="Stok" name="Stok"
                            value="{{ old('Stok', $produks->Stok) }}" placeholder="Stok Produk" required>
                    </div>
                    <div class="mb-4">
                        <label class="required-field text-white" for="image">Foto Produk</label>
                        <input type="file" class="form-control" id="image" name="image"
                            value="{{ old('image', $produks->image) }}" required>
                    </div>
                    <div class="mb-4">
                        <button type="submit" name="submit" class="btn btn-success me-3">Update</button>
                        <a class="btn btn-secondary" href="{{ route('produk.index') }}">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection