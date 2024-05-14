@extends('auth.header')
@section('content')

<br><br>
<header class="container-header mb-4"
    style="background-color: #003049; color: white; padding: 20px; border-radius: 15px; box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);">
    <h2 class="text-white">Tambah Pesanan</h2>
</header>

<div class="container rounded-3" style="background-color: #003049; padding-top: 5%; padding-bottom: 5%;">
    <div class="row">
        <div class="col-lg-7 order-lg-1">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="contact-form__wrapper p-5 shadow-lg">
                <form action="{{ route('detailpenjualan.store') }}" method="POST" class="contact-form form-validate"
                    novalidate="novalidate">
                    {{ csrf_field() }}
                    <input type="hidden" id="PenjualanId" name="PenjualanId" readonly value="{{$penjualans[0]->id}} ">
                    <div class="mb-4">
                        <label class="required-field text-white" for="nama">Nama Pelanggan</label>
                        <input type="text" class="form-control" id="PenjualanId" name="nama" readonly
                            value="{{$penjualans[0]->NamaPelanggan}} ">
                    </div>
                    <div class="mb-4">
                        <label class="required-field text-white" for="JumlahProduk">Jumlah Produk</label>
                        <input type="text" class="form-control" id="JumlahProduk" name="JumlahProduk"
                            value="{{ old('JumlahProduk') }}">
                    </div>
                    <div class="mb-4">
                        <label class="required-field text-white" for="ProdukId">Nama Produk</label><br>
                        <select class="form-select" name="ProdukId">
                            <option selected disabled>Pilih Produk</option>
                            @forelse ($produks as $produk)
                                <option value="{{ $produk->id }}">{{ $produk->NamaProduk }}</option>
                            @empty
                                <option value="">Tidak ada produk</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="mb-4">
                        <button type="submit" name="submit" class="btn btn-success">Tambah</button>
                        <a class="btn btn-secondary" href="{{ route('penjualan.index') }}">Kembali</a>
                        <a href="{{ route('detailpenjualan.show', $ID) }}" class="btn btn-primary"
                            target="_blank">Print</a>
                    </div>
                </form>

            </div>

        </div>



    </div>
    <div style="margin-top: 2%;">
        <div class="contact-info__wrapper gradient-brand-color p-5 shadow-lg">
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Jumlah Produk</th>
                            <th>Sub Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($detailpenjualan as $dj)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $dj->NamaProduk }}</td>
                                <td>{{ $dj->JumlahProduk }}</td>
                                <td>{{ $dj->SubTotal }}</td>
                                <td>
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                        action="{{ route('detailpenjualan.destroy', $dj->id, $dj->PenjualanId) }}"
                                        method="POST">
                                        @csrf
                                        @method ('DELETE')
                                        <button type="submit" class="btn btn-danger">DELETE</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection