@extends('front.layouts.frontend')
@section('menu', 'active')
@section('prodi_paud', 'active')

@section('content')
    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">endidikan Anak Usia Dini</h6>
                <h1 class="mb-3">Expert Lecturer</h1>
            </div>
            <div class="row justify-content-center mb-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ asset('uploads/'.$guru->foto) }}" alt="">
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0"> {{ $guru->nama}} </h5>
                            <small> {{ $guru->jabatan->nama_jabatan }} </small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mb-4">
                @foreach ($guru2 as $item)    
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item bg-light">
                            <div class="overflow-hidden">
                                <img class="img-fluid" src="{{ asset('uploads/'.$item->foto) }}" alt="">
                            </div>
                            <div class="text-center p-4">
                                <h5 class="mb-0"> {{ $item->nama}} </h5>
                                <small> {{ $item->jabatan->nama_jabatan }} </small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row justify-content-center mb-4">
                @foreach ($guru3 as $row)                    
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item bg-light">
                            <div class="overflow-hidden">
                                <img class="img-fluid" src="{{ asset('uploads/'.$row->foto) }}" alt="">
                            </div>
                            <div class="text-center p-4">
                                <h5 class="mb-0"> {{ $row->nama}} </h5>
                                <small> {{ $row->jabatan->nama_jabatan }} </small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row justify-content-center g-4 m-4">
                @foreach ($guru4 as $row)                    
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item bg-light">
                            <div class="overflow-hidden">
                                <img class="img-fluid" src="{{ asset('uploads/'.$row->foto) }}" alt="">
                            </div>
                            <div class="text-center p-4">
                                <h5 class="mb-0"> {{ $row->nama}} </h5>
                                <small> {{ $row->jabatan->nama_jabatan }} </small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row justify-content-center g-4">
                @if ($guru_visimisi)
                <div class="text-center wow fadeInUp" data-wow-delay="0.15">
                    <h2>Visi, Misi, dan Tujuan</h2>
                    <p>VISI, MISI SERTA TUJUAN PROGRAM STUDI PENDIDIKAN GURU - PENDIDIKAN ANAK USIA DINI</p>
                </div>
                <div class="row justify-content-center text-center mb-3 wow fadeInUp" data-wow-delay="0.15">
                    <div class="col-lg-7 col-md-12">
                        <div class="d-flex justify-content-center align-items-center">
                            <div id="paud-visi-animasi" style="width: 300px;"></div>
                        </div>
                        {{-- <img src="{{ asset('elearning/img/visi.png') }}" class="img-fluid" alt=""> --}}
                        <h2>Visi</h2>
                        <div class="text-wrap">
                            <p>{!! $guru_visimisi->visi !!}</p>
                        </div>
                    </div>
                    
                    
                </div>
                <div class="row justify-content-center text-center mb-3 wow fadeInUp" data-wow-delay="0.15">
                    <div class="col-lg-7 col-md-12">
                        <div class="d-flex justify-content-center align-items-center">
                            <div id="paud-misi-animasi" style="width: 300px;"></div>
                        </div>
                        {{-- <img src="{{ asset('elearning/img/misi.png') }}" class="img-fluid" alt=""> --}}
                        <h2>Misi</h2>
                        <div class="text-start">
                            <p>{!! $guru_visimisi->misi !!}</p>
                        </div>
                        {{-- <div class="card border-dark">
                            <h2 class="card-header bg-dark text-bg-primary"><i class="fa fa-globe text-light" width="1em"></i><br>Misi</h2>
                            <div class="card-body">
                                <div class="text-start">
                                    <p>{!! $guru_visimisi->misi !!}</p>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="row justify-content-center text-center mb-3 wow fadeInUp" data-wow-delay="0.15">
                    <div class="col-lg-7 col-md-12">
                        <div class="d-flex justify-content-center align-items-center">
                            <div id="paud-tujuan-animasi" style="width: 300px;"></div>
                        </div>
                        {{-- <img src="{{ asset('elearning/img/tujuan.png') }}" class="img-fluid" alt=""> --}}
                        <h2>Tujuan</h2>
                        <div class="text-start">
                            <p>{!! $guru_visimisi->tujuan !!}</p>
                        </div>
                        {{-- <div class="card border-dark">
                            <h2 class="card-header bg-dark text-bg-primary"><x-clarity-bullseye-line width="1.2em" /></i><br>Tujuan</h2>
                            <div class="card-body">
                                <div class="text-start">
                                    <p>{!! $guru_visimisi->tujuan !!}</p>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Team End -->
@endsection
