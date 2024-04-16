@extends('auth.header')
@section('content')

<br><br>
<a class="btn btn-primary" href="{{ route('produk.create') }}">Tambah Penjualan</a>
<br><br>
            {{--  <div class="table-responsive text-nowrap">  --}}
                <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
               @forelse ($produks as $produk)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td><img class="img-t" src="{{ asset('storage/produks/'.$produk->image) }}" alt="" width="100"></td>
                            <td>{{ $produk->NamaProduk }}</td>
                            <td>{{ $produk->Harga }}</td>
                            <td>{{ $produk->Stok }}</td>
                            <td>
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('produk.destroy', $produk->id) }}" method="POST">
                                <a class="btn btn-success" href="{{ route('produk.edit', $produk->id) }}">EDIT</a>
                 @csrf
                 @method ('DELETE')
                                <button class="btn btn-danger" type="submit">DELETE</button>
                                </form>
                            </td>
                        </tr>
                @empty
                @endforelse
             </table>
            </div>
            {{ $produks->links() }}
                </div>
                </div>
    
    @endsection
</body>
</html>