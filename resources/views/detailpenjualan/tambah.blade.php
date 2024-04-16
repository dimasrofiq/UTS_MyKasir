 @extends('auth.header')
    @section('content')
       <body>
         <br><br>
          <div class="container">
              <div class="contact__wrapper shadow-lg mt-n9">
                <h4>&nbsp; Tambah Pesanan</h4>
                  <div class="row no-gutters">
                      <div class="col-lg-5 contact-info__wrapper gradient-brand-color p-5 order-lg-2">
                        <div class="table-responsive">
                        <table class="table">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Jumlah Produk</th>
                                    <th>Sub Total</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($detailpenjualan as $dj)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $dj->NamaProduk }}</td>
                                    <td>{{ $dj->JumlahProduk }}</td>
                                    <td>{{ $dj->SubTotal }}</td>
                                                            
                                   
                                    <td>
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('detailpenjualan.destroy', $dj->id, $dj->PenjualanId) }}" method="POST">
                                        @csrf
                                        @method ('DELETE')
                                        <button type="submit" class="btn btn-danger">DELETE</button>
                                    </form>
                                    </td>
                                </tr>
                                @empty
                                @endforelse
                            </tbody>
                          </table>
                      </div>
                      </div>
              
                      <div class="col-lg-7 contact-form__wrapper p-5 order-lg-1">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                          <form action="{{ route('detailpenjualan.store') }}" method="POST" class="contact-form form-validate" novalidate="novalidate">
                            {{ csrf_field() }}
                            @csrf
                            <input type="hidden" id="PenjualanId" name="PenjualanId" readonly value="{{$penjualans[0]->id}} ">
                             <div class="row">
                                  <div class="col-sm-6 mb-3">
                                      <div class="form-group">
                                          <label class="required-field" for="nama">Nama Pelanggan</label>
                                          <input type="text" class="form-control"  id="PenjualanId" name="nama" readonly value="{{$penjualans[0]->NamaPelanggan}} ">
                                      </div>
                                  </div>
            
                                  <div class="col-sm-6 mb-3">
                                      <div class="form-group">
                                          <label class="required-field" for="JumlahProduk">Jumlah Produk</label>
                                          <input type="text" class="form-control" id="JumlahProduk" name="JumlahProduk" value="{{ old('JumlahProduk') }}">
                                      </div>
                                  </div>
                                  
                                  <div class="col-sm-6 mb-3">
                                    <div class="form-group">
                                      <label for="ProdukId">Nama Produk</label><br>
                                      <select class="form-select" name="ProdukId">
                                        <option>Pilih Produk</option>
                                        @forelse ($produks as $produk)
                                        <option value="{{ $produk->id }}">{{ $produk->NamaProduk }}</option>
                                        @empty
                                        @endforelse
                                      </select>
                                    </div>
                                </div>

                                     <div class="col-sm-12 mb-3">
                                    <br>
                                      <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
                                      <a class="btn btn-primary" href="{{ route('penjualan.index') }}">Kembali</a>
                                      <a href="{{ route('detailpenjualan.show', $ID) }}" class="btn btn-primary" target="_blank">CETAK PDF</a>
                                      <table class='table table-bordered'>
                                    
                                    
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
         
@endsection

