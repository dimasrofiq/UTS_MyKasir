<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Produk</title>
    <style>


    </style>
</head>

<body>

    @extends('auth.header')
    @section('content')

    <br><br>
    <header class="container-header"
        style="background-color: #003049; color: white; padding: 20px; border-radius: 15px; margin-bottom: 10px;">
        <h2 class="text-white">Daftar Produk</h2>
    </header>
    <div class="container rounded-3" style="background-color: #003049; padding-top: 5%;">
        <a class="btn btn-success mb-3" href="{{ route('produk.create') }}">
            <i class="fas fa-plus-circle me-2"></i> Tambah Produk
        </a>
        <br><br>
        <div class="table-responsive">
            <table class="table table-striped table-hover text-white"
                style="box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
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
                            <td><img class="img-t" src="{{ asset('storage/produks/' . $produk->image) }}" alt=""
                                    width="100"></td>
                            <td>{{ $produk->NamaProduk }}</td>
                            <td>Rp{{ $produk->Harga }}</td>
                            <td>{{ $produk->Stok }}</td>
                            <td>
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                    action="{{ route('produk.destroy', $produk->id) }}" method="POST">
                                    <a class="btn btn-success btn-sm" href="{{ route('produk.edit', $produk->id) }}">
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
        {{ $produks->links() }}
    </div>
    @endsection
</body>

</html>