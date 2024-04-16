@extends('siswa.header')

@section('content')

<div class="container-fluid">
	<h1>Data Siswa</h1>
	{{--  <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >Logout</a>
	<form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
		
    </form>
    <br>
	<a href="{{ route('siswa.create') }}" class="btn btn-sm btn-primary">Tambah Siswa</a>
	<br>  --}}
	<br>
	<div class="card">
	<table class="table table-hover text-center">
		<tr>
			<th>Nama</th>
			<th>Jenis Kelamin</th>
			<th>Kelas</th>
			<th>Jurusan</th>
			<th>Foto</th>
			<th>Aksi</th>
		</tr>
		@forelse ($siswas as $siswa)
		<tr>
			<td>{{ $siswa->nama }}</td>
			<td>{{ $siswa->jk }}</td>
			<td>{{ $siswa->kelas }}</td>
			<td>{{ $siswa->jurusan }}</td>
			<td>
				<img class="img-t" src="{{ asset('storage/siswas/'.$siswa->image) }}" >
			</td>
			<td>
				<form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('siswa.destroy', $siswa->id) }}" method="POST">
				 	<a href="{{ route('siswa.show', $siswa->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                    <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                    @csrf
                    @method ('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                </form>
			</td>
		</tr>
		@empty
		@endforelse
	</table>
	{{ $siswas->links() }}
</div>
</div>

@endsection

@extends('siswa.footer')
