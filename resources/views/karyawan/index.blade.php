@extends('auth.header')

@section('content')

<br><br>
<header class="container-header"
    style="background-color: #003049; color: white; padding: 20px; border-radius: 15px; margin-bottom: 10px;">
    <h2 class="text-white">Daftar Karyawan</h2>
</header>

<div class="container rounded-3" style="background-color: #003049; padding-top: 5%;">
    <a class="btn btn-success mb-3" href="{{ route('karyawan.create') }}">
        <i class="fas fa-plus-circle me-2"></i> Tambah Karyawan
    </a>
    <br><br>
    <div class="table-responsive">
        <table class="table table-striped table-hover text-white" style="box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $karyawan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $karyawan->name }}</td>
                        <td>{{ $karyawan->email }}</td>
                        <td>
                            @if ($karyawan->role_id == '1')
                                Administrator
                            @else 
                                Petugas
                            @endif
                        </td>
                        <td>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                action="{{ route('karyawan.destroy', $karyawan->id) }}" method="POST">
                                <a class="btn btn-success btn-sm" href="{{ route('karyawan.edit', $karyawan->id) }}">
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
                        <td colspan="5">Tidak ada data karyawan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $users->links() }}
</div>

@endsection