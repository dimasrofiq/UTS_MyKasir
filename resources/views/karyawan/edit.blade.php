@extends('auth.layouts')
@section('content')


                  @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
                  {{--  <form class="mx-1 mx-md-4" action="{{ route('karyawan.update', $users->id )}}" method="POST">
                    @csrf
                    @method('PUT')

                    <label>Your Name</label><br>
                    <input type="text" id="name" name="name" value="{{ old('name', $users->name) }}" /><br><br>
                    <input type="submit"  value="update"> <br>
                    <a href="{{ route('karyawan.index') }}"  style="margin-left: 150px;">Kembali</a>
                </form>
                </section>  --}}

                <br><br>
                <div class="container">
                    <div class="contact__wrapper shadow-lg mt-n9">
                        <h4>&nbsp; Edit Karyawan</h4>
                        <div class="row no-gutters">
                            <div class="col-lg-5 contact-info__wrapper gradient-brand-color p-5 order-lg-2">
                                <div class="alert alert-dark" role="alert">
                                  Pastikan data karyawan yang anda input telah benar dan sesuai!
                                </div>
                                
                                <ul class="contact-info__list list-style--none position-relative z-index-101">
                                    <li class="mb-4 pl-4">
                                        <span class="position-absolute">Nama Karyawan Minimal 3 karakter</li>
                                    </li>
                                </ul>
{{--                      
                                <figure class="figure position-absolute m-0 opacity-06 z-index-100" style="bottom:0; right: 10px">
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
                                <form action="{{ route('karyawan.update')}}" method="POST" class="contact-form form-validate" novalidate="novalidate">
                                  {{ csrf_field() }}
                                  @csrf
                                    <div class="row">
                                        <input type="hidden" class="form-control"  id="id" name="name" value="{{ $users->id} }">
                                        <div class="col-sm-6 mb-3">
                                            <div class="form-group">
                                                <label class="required-field" for="firstName">Name Karyawan</label>
                                                <input type="text" class="form-control"  id="name" name="name" value="{{ old('name', $users->name) }}">
                                            </div>
                                        </div>
                
                                        <div class="col-sm-12 mb-3">
                                            <button type="submit" name="update" class="btn btn-primary">Update</button>
                                            <a class="btn btn-primary" href="{{ route('karyawan.index') }}">Kembali</a>
                              
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

@endsection

