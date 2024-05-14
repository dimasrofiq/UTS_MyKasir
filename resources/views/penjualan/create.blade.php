@extends('auth.header')
@section('content')

<br><br>
<header class="container-header mb-4"
    style="background-color: #003049; color: white; padding: 20px; border-radius: 15px; box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);">
    <h2 class="text-white">Tambah Penjualan</h2>
</header>

<div class="container rounded-3" style="background-color: #003049; padding-top: 5%; padding-bottom: 5%;">
    <div class="row">
        <div class="col-lg-5 order-lg-2">
            <div class="contact-info__wrapper gradient-brand-color p-5 shadow-lg">
                <div class="alert alert-dark" role="alert">
                    <span class="text-black">Pastikan data Penjualan yang Anda input telah benar dan sesuai!</span>
                </div>
                <ul class="contact-info__list list-unstyled position-relative z-index-101">
                    <li class="mb-4 ps-4 text-white">
                        <i class="fas fa-calendar-day me-2"></i> Tanggal Penjualan Harus Tepat
                    </li>
                    <li class="mb-4 ps-4 text-white">
                        <i class="fas fa-user me-2"></i> Nama Pelanggan tidak boleh tertukar
                    </li>
                    <li class="mb-4 ps-4 text-white">
                        <i class="fas fa-money-bill-wave me-2"></i> Cek harga yang Anda masukkan dengan teliti.
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-7 order-lg-1">
            <div class="contact-form__wrapper p-5 shadow-lg">
                <form action="{{ route('penjualan.store') }}" method="POST" class="contact-form form-validate"
                    novalidate="novalidate">
                    @csrf
                    <div class="mb-4">
                        <label class="required-field text-white" for="TanggalPenjualan">Tanggal Penjualan</label>
                        <input type="date" class="form-control" id="TanggalPenjualan" name="TanggalPenjualan"
                            value="{{ old('TanggalPenjualan') }}" required>
                    </div>
                    <div class="mb-4">
                        <label class="required-field text-white" for="TotalHarga">Total Harga</label>
                        <input type="tel" class="form-control" id="TotalHarga" name="TotalHarga" placeholder="Rp 0.000"
                            required>
                    </div>
                    <div class="mb-4">
                        <label class="required-field text-white" for="PelangganId">Nama Pelanggan</label>
                        <select class="form-select" name="PelangganId" required>
                            <option selected disabled>Pilih Member</option>
                            @forelse ($pelanggans as $pelangan)
                                <option value="{{ $pelangan->id }}">{{ $pelangan->NamaPelanggan }}</option>
                            @empty
                                <option value="">Tidak ada pelanggan</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="mb-4">
                        <button type="submit" name="submit" class="btn btn-success me-3">Tambah</button>
                        <a class="btn btn-secondary" href="{{ route('penjualan.index') }}">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection