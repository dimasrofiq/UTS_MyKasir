<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Azi saputra|edit</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

	<h1>Edit Siswa</h1>
	<a href="{{ route('siswa.index') }}">Kembali</a><br><br>
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<div class="signup-form" style="margin-top: -53px;">
					<form action="{{ route('siswa.update', $siswas->id) }}" method="POST" enctype="multipart/form-data" class="mt-5 border p-4 bg-light shadow">
						@csrf
						@method('PUT')
					<h4 class="mb-5 text-secondary">Tambah Sia</h4>
						<div class="row">
							<div class="mb-3 col-md-12">
								<label>NAMA SISWA <span class="text-danger">*</span></label>
								<input  class="form-control" type="text" name="nama" value="{{ old('nama', $siswas->nama) }}">
							</div>
							<div class="mb-3 col-md-6">
								<label>JENIS KELAMIN <span class="text-danger">*</span></label><br>
								<select class="form-select" name="jk" required>
									<option>Pilih JK</option>
									<option  {{ 'Laki-laki' == $siswas->jk ? 'selected' : '' }} value="Laki-laki">Laki-laki</option>
									<option  {{ 'Perempuan' == $siswas->jk ? 'selected' : '' }} value="Perempuan">Perempuan</option>
								</select>
							</div>

							<div class="mb-3 col-md-6">
								<label>KELAS <span class="text-danger">*</span></label><br>
								<select class="form-select" name="kelas" required>
									<option>Pilih kelas</option>
									<option {{ '10' == $siswas->kelas ? 'selected' : '' }} value="10">10</option>
									<option {{ '11' == $siswas->kelas ? 'selected' : '' }} value="11">11</option>
									<option {{ '12' == $siswas->kelas ? 'selected' : '' }} value="12">12</option>
								</select>
							</div>

							<div class="mb-3 col-md-12">
								<select class="form-select" aria-label="Default select example"  name="jurusan">
									<option selected>JURUSAN</option>
									<option {{ 'RPL' == $siswas->jurusan ? 'selected' : '' }} value="RPL">RPL</option>
									<option {{ 'TKJ' == $siswas->jurusan ? 'selected' : '' }} value="TKJ">TKJ</option>
									<option {{ 'TKR' == $siswas->jurusan ? 'selected' : '' }} value="TKR">TKR</option>
								</select>
							</div>

							<div class="mb-3 col-md-12">
								<label>FOTO SIA<span class="text-danger">*</span></label>
								<input type="file" name="image" class="form-control">
							</div>
							<div class="col-md-12" style="display: flex; justify-content: space-between;">

								<button type="submit" class="btn btn-primary">SIMPAN DATA</button>
								<button type="reset" class="btn btn-primary">RESET DATA</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


</body>
</html>

