{{--  @extends('auth.layouts')

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
        <form action="{{ route('produk.update', $produks->id )}}" enctype="multipart/form-data" method="POST">
          @csrf
          @method('PUT')
     
          <label>Nama Produk</label><br>
          <input type="text" id="NamaProduk" name="NamaProduk" value="{{ old('NamaProduk', $produks->NamaProduk) }}" /><br><br>

          <label>Harga</label><br>
          <input type="text" id="Harga" name="Harga" value="{{ old('Harga', $produks->Harga) }}" /><br><br>

          <label>Stok</label><br>
          <input type="number" id="Stok" name="Stok" value="{{ old('Stok', $produks->Stok) }}" /><br><br>

          <label>Foto Produk</label><br>
          <input type="file" id="image" name="image" value="{{ old('image', $produks->image) }}" /><br><br>

          <input type="submit"  value="update"> <br>
          <a href="{{ route('produk.index') }}"  style="margin-left: 150px;">Kembali</a>
          
      </form>
      </section>  --}}


      @extends('auth.header')
      @section('content')
      
              <br><br>
                <div class="container">
                    <div class="contact__wrapper shadow-lg mt-n9">
                      <h4>&nbsp; Tambah produk</h4>
                        <div class="row no-gutters">
                            <div class="col-lg-5 contact-info__wrapper gradient-brand-color p-5 order-lg-2">
                                <div class="alert alert-dark" role="alert">
                                  Pastikan data produk yang anda Input telah benar dan sesuai Ketentuan!
                                </div>
                                
                                <ul class="contact-info__list list-style--none position-relative z-index-101">
                                    <li class="mb-4 pl-4">
                                        <span class="position-absolute">gambar harus berupa file dengan tipe: jpeg, png, jpg.</li>
                                    <li class="mb-4 pl-4">
                                        <span class="position-absolute">Pastikan stok sesuai dengan data</li>
                                    <li class="mb-4 pl-4">
                                        <span class="position-absolute">Cek harga yang anda masukan dengan teliti</li>         .
                                    </li>
                                </ul>
                    
                                {{--  <figure class="figure position-absolute m-0 opacity-06 z-index-100" style="bottom:0; right: 10px">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="444px" height="626px">
                                        <defs>
                                            <linearGradient id="PSgrad_1" x1="0%" x2="81.915%" y1="57.358%" y2="0%">
                                                <stop offset="0%" stop-color="rgb(255,255,255)" stop-opacity="1"></stop>
                                                <stop offset="100%" stop-color="rgb(0,54,207)" stop-opacity="0"></stop>
                                            </linearGradient>
                    
                                        </defs>
                                        <path fill-rule="evenodd" opacity="0.302" fill="rgb(72, 155, 248)" d="M816.210,-41.714 L968.999,111.158 L-197.210,1277.998 L-349.998,1125.127 L816.210,-41.714 Z"></path>
                                        <path fill="url(#PSgrad_1)" d="M816.210,-41.714 L968.999,111.158 L-197.210,1277.998 L-349.998,1125.127 L816.210,-41.714 Z"></path>
                                    </svg>
                                </figure>  --}}
                            </div>
                    
                            <div class="col-lg-7 contact-form__wrapper p-5 order-lg-1">
                                <form action="{{ route('produk.update',$produks->id) }}" method="POST" class="contact-form form-validate" novalidate="novalidate" enctype="multipart/form-data">
                                  @csrf
                                  @method('PUT')
                                  @if ($errors->any())
                                  <div class="alert alert-danger">
                                      <ul>
                                          @foreach ($errors->all() as $error)
                                              <li>{{ $error }}</li>
                                          @endforeach
                                      </ul>
                                  </div>
                              @endif
                                    <div class="row">
                                        <div class="col-sm-6 mb-3">
                                            <div class="form-group">
                                                <label class="required-field" for="NamaProduk">Nama Produk</label>
                                                <input type="text" class="form-control" id="NamaProduk" name="NamaProduk" value="{{ old('NamaProduk', $produks->NamaProduk) }}">
                                            </div>
                                        </div>
                    
                                        <div class="col-sm-6 mb-3">
                                            <div class="form-group">
                                                <label class="required-field" for="Harga">Harga</label>
                                                <input type="text" class="form-control" id="Harga" name="Harga" value="{{ old('Harga', $produks->Harga) }}">
                                            </div>
                                        </div>
  
                                        <div class="col-sm-6 mb-3">
                                            <div class="form-group">
                                                <label class="required-field" for="Stok">Stok Produk</label>
                                                <input type="text" class="form-control" id="Stok" name="Stok" value="{{ old('Stok', $produks->Stok) }}">
                                            </div>
                                        </div>
                    
                                        <div class="col-sm-6 mb-3" margin-left: 10px;>
                                            <div class="form-group">
                                                <label class="required-field" for="image">Foto Produk</label><br>
                                                <input type="file" class="form-control" id="image" name="image" value="{{ old('image', $produks->image) }}" />
                                            </div>
                                        </div>
      
                                        <div class="col-sm-12 mb-3">
                                          <br>
                                            <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
                                            <a class="btn btn-primary" href="{{ route('produk.index') }}">Kembali</a>
                                            
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
      
       @endsection
      

