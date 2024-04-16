@extends('auth.layouts')

@section('content')

                  <h1>Edit Member</h1>
                  @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
                  <form action="{{ route('penjualan.update', $penjualan->id )}}" method="POST" class="mx-1 mx-md-4">
                    @csrf
                    @method('PUT')

                    <label>Your Name</label><br>
                    <input type="text" id="NamaPelanggan" name="NamaPelanggan" value="{{ old('NamaPelanggan', $penjualan->NamaPelanggan) }}" /><br><br>
                    <label>Your Alamat</label><br>
                    <input type="text" id="Alamat" name="Alamat" value="{{ old('Alamat', $penjualan->Alamat) }}" /><br><br>
                    <label>Nomor Telpon</label><br>
                    <input type="number" id="NomorTelepon" name="NomorTelepon" value="{{ old('NomorTelepon', $penjualan->NomorTelepon) }}" /><br><br>
                    <input type="submit"  value="update"> <br>

                    <a href="{{ route('member.index') }}"  style="margin-left: 150px;">Kembali</a>
                
  
                </form>
                </section>
                
@endsection

