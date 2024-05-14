@extends('auth.header')
@section('content')

@if ($message = Session::get('success'))
@else
<br><br>
  <div class="container">
  <div class="row justify-content-center">
    <!-- Card Produk -->
    <div class="col-md-6 mb-4">
    <div class="card text-white" style="background-color: #003049;">
      <div class="card-body" style="padding-top: 10px;">
      <div style="padding-top: 10px;">
        <i class="fas fa-box-open fa-3x mb-3"></i>
      </div>
      <h5 class="card-title" style="padding-top: 10px;">Produk</h5>
      <p class="card-text" style="padding-top: 10px;">Tambahkan, edit, atau
        hapus produk, serta atur stok dan harga dengan cepat dan efisien
      </p>
      <a href="{{ route('produk.index') }}" class="btn btn-light" style="margin-top: 10px;">Go to Produk</a>
      </div>
    </div>
    </div>

    <!-- Card Penjualan -->
    <div class="col-md-6 mb-4">
    <div class="card text-white" style="background-color: #003049;">
      <div class="card-body" style="padding-top: 10px;">
      <div style="padding-top: 10px;">
        <i class="fas fa-chart-line fa-3x mb-3"></i>
      </div>
      <h5 class="card-title" style="padding-top: 10px;">Penjualan</h5>
      <p class="card-text" style="padding-top: 10px;">Pantau semua transaksi penjualan Anda dalam satu tempat. Lihat
        riwayat penjualan, dan detail pembayaran
      </p>
      <a href="{{ route('penjualan.index') }}" class="btn btn-light" style="margin-top: 10px;">Go to Penjualan</a>
      </div>
    </div>
    </div>

    <!-- Card Pelanggan -->
    <div class="col-md-6 mb-4">
    <div class="card text-white" style="background-color: #003049;">
      <div class="card-body" style="padding-top: 10px;">
      <div style="padding-top: 10px;">
        <i class="fas fa-users fa-3x mb-3"></i>
      </div>
      <h5 class="card-title" style="padding-top: 10px;">Pelanggan</h5>
      <p class="card-text" style="padding-top: 10px;">Manajemen data pelanggan yang efektif. Tambahkan atau hapus
        pelanggan
      </p>
      <a href="{{ route('member.index') }}" class="btn btn-light" style="margin-top: 10px;">Go to Pelanggan</a>
      </div>
    </div>
    </div>

    <!-- Card Karyawan -->
    <div class="col-md-6 mb-4">
    <div class="card text-white" style="background-color: #003049;">
      <div class="card-body" style="padding-top: 10px;">
      <div style="padding-top: 10px;">
        <i class="fas fa-user-tie fa-3x mb-3"></i>
      </div>
      <h5 class="card-title" style="padding-top: 10px;">Karyawan</h5>
      <p class="card-text" style="padding-top: 10px;">Tambahkan, hapus, atau
        edit detail karyawan, serta tetapkan peran dan izin dengan mudah
      </p>
      <a href="{{ route('karyawan.index') }}" class="btn btn-light" style="margin-top: 10px;">Go to Karyawan</a>
      </div>
    </div>
    </div>
  </div>
  </div>

@endif  @endsection