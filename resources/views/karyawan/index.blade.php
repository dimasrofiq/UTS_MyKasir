@extends('auth.header')
@section('content')
<br><br>
<a class="btn btn-primary" href="{{ route('karyawan.create') }}">Tambah Karyawan</a><br><br>
 <!-- HTML !-->
{{--  <button class="button-64" role="button"><span class="text">Button 64</span></button>  --}}
<div class="table-responsive text-nowrap">
    <div class="table-responsive">
    <!--Table-->
    <table class="table table-striped">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Role ID</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($users as $karyawan)
        <tr>
            <td>{{$loop->iteration}}</td>

            <td scope="row">{{ $karyawan->name }}</td>
            <td>            {{ $karyawan->email }}</td>

            @if ($karyawan->role_id == '1') 
                <td>Administrator</td>
            @else 
                <td>Petugas</td>
            @endif
            
                <td>
                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('karyawan.destroy', $karyawan->id) }}" method="POST">
                <a class="btn btn-success" href="{{ route('karyawan.edit', $karyawan->id) }}">EDIT</a>
               
                        @csrf
                        @method ('DELETE')
                        <button type="submit" class="btn btn-danger">DELETE</button>
                    </form>
                   </td>
                  </tr>
               @empty
             @endforelse
          </tbody>
        </div>
    </table>
    {{ $users->links() }}
    </div>
    </div>
    
    @endsection
