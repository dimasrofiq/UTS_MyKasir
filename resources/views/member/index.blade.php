@extends('auth.header')
@section('content')

<br><br>
<a class="btn btn-primary" href="{{ route('member.create') }}">Tambah Member</a>
<br><br>
<div class="table-responsive text-nowrap">
    <div class="table-responsive">
          <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Member</th>
                        <th>Alamat</th>
                        <th>NO Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($members as $member)
                    <tr>
                        <td>{{$loop->iteration}}</td>

                        <td>{{ $member->NamaPelanggan }}</td>
                        <td>{{ $member->Alamat }}</td>
                        <td>{{ $member->NomorTelepon }}</td>
                        <td>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('member.destroy', $member->id) }}" method="POST">
                                <a class="btn btn-success" href="{{ route('member.edit', $member->id) }}">EDIT</a>
                                @csrf
                                @method ('DELETE')
                                <button type="submit" class="btn btn-danger">DELETE</button>
                            </form>
                        </td>
                        @empty
                        @endforelse
                    </tr>
             </tbody>
          </div>
        </table>
    </div>
    {{ $members->links() }}
      </div>
    </div>
    
    @endsection
    @extends('member.footer')