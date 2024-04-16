{{--  @extends('karyawan.header')  --}}
@extends('auth.header')
@section('content')

<body>
         <br><br>
          <div class="container">
              <div class="contact__wrapper shadow-lg mt-n9">
                <h4>&nbsp; Tambah Karyawan</h4>
                  <div class="row no-gutters">
                      <div class="col-lg-5 contact-info__wrapper gradient-brand-color p-5 order-lg-2">
                          <div class="alert alert-dark" role="alert">
                            Pastikan data karyawan yang anda input telah benardan sesuai!
                          </div>
                          
                          <ul class="contact-info__list list-style--none position-relative z-index-101">
                              <li class="mb-4 pl-4">
                                  <span class="position-absolute">Nama Karyawan Minimal 3 karakter</li>
                              <li class="mb-4 pl-4">
                                  <span class="position-absolute">Email Pengguna Pribadi atau perusahan</li>
                              <li class="mb-4 pl-4">
                                  <span class="position-absolute">Masukkan Password Minimal 8 Karakter dan Maximal 16 Karakter.
                                  <div class="mt-3">
                                      <a href="https://www.google.com/maps" target="_blank" class="text-link link--right-icon text-white">Get directions <i class="link__icon fa fa-directions"></i></a>
                                  </div>
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
                          <form action="{{ route('karyawan.store') }}" method="POST"class="contact-form form-validate" novalidate="novalidate">
                            {{ csrf_field() }}
                            @csrf
                              <div class="row">
                                  <div class="col-sm-6 mb-3">
                                      <div class="form-group">
                                          <label class="required-field" for="firstName">Name Karyawan</label>
                                          <input type="text" class="form-control"  id="name" name="name" value="{{ old('name') }}" placeholder="Name Karyawan">
                                      </div>
                                  </div>
              
                                  <div class="col-sm-6 mb-3">
                                      <div class="form-group">
                                          <label for="password">Password</label>
                                          <input type="password" class="form-control" type="password" id="password" name="password" placeholder="Masukan Password">
                                      </div>
                                  </div>
              
                                  <div class="col-sm-6 mb-3">
                                      <div class="form-group">
                                          <label class="required-field" for="email">Email</label>
                                          <input type="email" class="form-control" id="email" name="email" placeholder=" karyawan.kasir@gmail.com">
                                      </div>
                                  </div>
              
                                  <div class="col-sm-6 mb-3">
                                      <div class="form-group">
                                          <label for="Password confimation">Password confimation</label>
                                          <input type="password" class="form-control" id="password" name="password_confirmation" placeholder="Konfirmasi Password">
                                      </div>
                                  </div>
                                  
                                  <div class="col-sm-12 mb-3">
                                    <br>
                                      <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
                                      <a class="btn btn-primary" href="{{ route('karyawan.index') }}">Kembali</a>

                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>

@endsection
