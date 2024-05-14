@extends('auth.header')
@section('content')

<br><br>
<header class="container-header"
    style="background-color: #003049; color: white; padding: 20px; border-radius: 15px; margin-bottom: 10px;">
    <h2 class="text-white">Daftar Penjualan</h2>
</header>

<div class="container rounded-3" style="background-color: #003049; padding-top: 5%;">
    <a class="btn btn-success mb-3" href="{{ route('penjualan.create') }}">
        <i class="fas fa-plus-circle me-2"></i> Tambah Penjualan
    </a>
    <br><br>
    <div class="table-responsive">
        <table class="table table-striped table-hover text-white" style="box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Penjualan</th>
                    <th>Pelanggan</th>
                    <th>Total Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($penjualans as $penjualan)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ $penjualan->TanggalPenjualan }}</td>
                        @if($penjualan->PelangganId == 0)
                            <td> Bukan Member </td>
                        @else
                            <td>{{ $penjualan->NamaPelanggan }}</td>
                            <td>Rp{{ $penjualan->TotalHarga }}</td>
                        @endif
                        <td>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                action="{{ route('penjualan.destroy', $penjualan->id) }}" method="POST">
                                <a class="btn btn-secondary btn-sm"
                                    href="{{ route('detailpenjualan.edit', $penjualan->id) }}">
                                    <i class="fas fa-shopping-cart me-1"></i> Tambah Pesanan
                                </a>
                                <a class="btn btn-success btn-sm" href="{{ route('penjualan.edit', $penjualan->id) }}">
                                    <i class="fas fa-edit me-1"></i> EDIT
                                </a>
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">
                                    <i class="fas fa-trash-alt me-1"></i> DELETE
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection