<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
    <script src="https://kit.fontawesome.com/cb0709d530.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script>
    .table-responsive {
        max-height: 200px;
        overflow: scroll;
      }
      .img-t{
        width: 71px;
        aspect-ratio: 2 / 2;
        object-fit: cover;
        border-radius: 50%;
      }
      .d-flex{
        margin-top: 15px;
      }
</script>
</head>
<body>
      <div class="container">
          <div class="contact__wrapper shadow-lg mt-n9">
            <div class="col d-flex flex-column align-items-center">
                <center>
            <h1>TasMart</h1> 
            <p class="mt-0 mb-1 text-center" style="font-size: 15px;">Jl M. H. Thamrin, No. 9</p>
            <p class="mt-0 mb-4 text-center" style="font-size: 15px;">221-691-6080</p>
        </div>
            <hr style="border: 2px solid black;">
            <div class="col my-5">
                <h3 align="center">Transaction Report</h3>
                <p align="center">For all transactions</p>
            </div>
        </center>
        @forelse ($penjualans as $pj)
        <h4>Nama Pelanggan : {{ $pj->NamaPelanggan}} </h4>
        @empty
        @endforelse
        
       
              <div class="row no-gutters">
                  <div class="col-lg-5 contact-info__wrapper gradient-brand-color p-5 order-lg-2">
                    <div class="table-responsive">
                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Nama Produk</th>
                                <th>Jumlah Produk</th>
                                <th>Sub Total</th>
                             
                            </tr> 
                        </thead>
                        <tbody>
                            @forelse ($detailpenjualan as $dj)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $dj->NamaProduk }}</td>
                                <td >{{ $dj->JumlahProduk }}</td>
                                <td>{{ $dj->SubTotal }}</td>
                            </tr>
                            @empty
                            @endforelse
                            {{$detailpenjualan}}
                        </tbody>
                      </table>
                       
                      <table class="table" align="center">
                        <table class="table">
                            <thead class="table-light">
                
                            </thead>
                        <tbody>
                            @forelse ($penjualans as $pj)
                            <tr>
                             <th colspan="3">Total Harga : </th>
                             <td align="center">{{ $pj->TotalHarga }}</td>
                            </tr>
                            @empty
                            @endforelse
                          
                        </tbody>
                      </table>
                      {{--  @forelse ($penjualans as $pj)
                      <h4 align="center">Total Harga :{{ $pj->TotalHarga}} </h4>
                      @empty
                      @endforelse  --}}
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
                  </div>
              </div>
          </div>
      </div>
     
    
      
