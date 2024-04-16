@extends('siswa.header')
@section('content')

<center><h1>Detail Siswa</h1></center>
	<section style="background-color: #eee;">
		<div class="container py-5">
		  <div class="row justify-content-center">
			<div class="col-md-8 col-lg-6 col-xl-4">
			  <div class="card text-black">
				<i class="fab fa-apple fa-lg pt-3 pb-1 px-3"></i>
				<img class="img-show" src="{{ asset('storage/siswas/'.$siswa->image) }}" style="width:120px;width: 120px;
				display: flex;
				align-items: center;
				position: fixed;" class="card-img-top" alt="Apple Computer"/>
				<div class="card-body">
				  <div class="text-center" style="margin-left: 94px;">
					<h5 class="card-title"> {{ $siswa->nama }}</h5>
					<p class="text-muted mb-4">SMKN 4 TASIKMALAYA</p>
				  </div>
				  <div>
					<br><br>
					<div class="d-flex justify-content-between">
					  <span>JENIS KELAMIN</span><span>{{ $siswa->jk }}</span>
					</div>
					<div class="d-flex justify-content-between">
					  <span>KELAS</span><span> {{ $siswa->kelas }}</span>
					</div>
					<div class="d-flex justify-content-between">
					  <span>JURUSAN</span><span>{{ $siswa->jurusan }}</span>
					</div>
				  </div>
				  </div>
				</div>
				<br><br>
				<center><a href="{{ route('siswa.index') }}" class="btn btn-sm btn-primary">Kembali</a> </center>
			  </div>
			</div>
		  </div>
		</div>
	  </section>
	  @endsection
	  @extends('siswa.footer')
