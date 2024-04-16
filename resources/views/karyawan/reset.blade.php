@extends('auth.layouts')

@section('content')

                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Reset Karyawan</p>
                  @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
                  <form class="mx-1 mx-md-4" action="{{ route('karyawan.update', $users->id )}}" method="POST">
                    @csrf
                    @method('PUT')

                    <label>Your Email</label><br>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" />

                    <label>Password</label><br>
                    <input type="password" id="password" name="password" />

                    <label>Repeat your password</label><br>
                    <input type="password" id="password" name="password_confirmation"/>

                    <input type="submit"  value="update"> <br>
                    <a href="{{ route('karyawan.index') }}"  style="margin-left: 150px;">Kembali</a>
                
  
                </form>
                </section>
                
@endsection

