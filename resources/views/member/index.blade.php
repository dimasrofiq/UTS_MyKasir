@extends('auth.header')

@section('content')

<br><br>
<header class="container-header"
    style="background-color: #003049; color: white; padding: 20px; border-radius: 15px; margin-bottom: 10px;">
    <h2 class="text-white">Daftar Pelanggan</h2>
</header>

<div class="container rounded-3" style="background-color: #003049; padding-top: 5%;">
    <a class="btn btn-success mb-3" href="{{ route('member.create') }}">
        <i class="fas fa-plus-circle me-2"></i> Tambah Pelanggan
    </a>
    <br><br>
    <div class="table-responsive">
        <table class="table table-striped table-hover text-white" style="box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>Alamat</th>
                    <th>Nomor Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($members as $member)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $member->NamaPelanggan }}</td>
                        <td>{{ $member->Alamat }}</td>
                        <td>{{ $member->NomorTelepon }}</td>
                        <td>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                action="{{ route('member.destroy', $member->id) }}" method="POST">
                                <a class="btn btn-success btn-sm" href="{{ route('member.edit', $member->id) }}">
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
                    <tr>
                        <td colspan="5">Tidak ada data pelanggan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $members->links() }}
</div>

@endsection