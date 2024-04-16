@extends('auth.header')
@section('content')

<br><br>
<a class="btn btn-primary" href="{{ route('penjualan.create') }}">Tambah Penjualan</a>
<br><br>
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
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
                @if( $penjualan->PelangganId == 0)
                            <td> Bukan Member </td>
                @else
                            <td>{{ $penjualan->NamaPelanggan }}</td>
                            <td>Rp,{{ $penjualan->TotalHarga }}</td>
                @endif
                            <td>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('penjualan.destroy', $penjualan->id) }}" method="POST">
                                <a class="btn btn-secondary" href="{{ route('detailpenjualan.edit', $penjualan->id) }}">TAMBAH PESANAN</a>
                                <a class="btn btn-success" href="{{ route('penjualan.edit', $penjualan->id) }}">EDIT</a>
                                
                @method ('DELETE')
                                <button class="btn btn-danger" type="submit">DELETE</button>
                                </form>
                            </td>
                        </tr>
                @empty
                @endforelse
            </tbody>
        </div>
        </table>
        </div>
        </div>

@endsection
@extends('penjualan.footer')