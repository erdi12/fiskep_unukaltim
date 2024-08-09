@extends('front.layouts.frontend')
@section('menu', 'active')
@section('prodi_hi', 'active')

@section('content')
    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Hubungan Internasional</h6>
                <h1 class="mb-5">Expert Lecturer</h1>
            </div>
            <div class="row justify-content-center mb-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ asset('uploads/'.$hubi2->foto) }}" alt="">
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0"> {{ $hubi2->nama}} </h5>
                            <small> {{ $hubi2->jabatan->nama_jabatan }} </small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center g-4 mb-4">                
                @foreach ($hubi_laboran as $row)                    
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
            </div><hr class="wow fadeInUp" data-wow-delay="0.1s">
            <div class="row justify-content-center g-4 mb-4">                
                @foreach ($hubi as $row)                    
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
                @if ($hubi_visi)
                <div class="text-center wow fadeInDown" data-wow-delay="0.15">
                    <h2>Visi, Misi, dan Tujuan</h2>
                    <p>VISI, MISI SERTA TUJUAN PROGRAM STUDI HUBUNGAN INTERNASIONAL</p>
                </div>
                <div class="row justify-content-center text-center mb-3 wow fadeInUp" data-wow-delay="0.15">
                    <div class="col-lg-7 col-md-12">
                        <div class="d-flex justify-content-center align-items-center">
                            <div id="hi-visi-animasi" style="width: 300px;"></div>
                        </div>
                        {{-- <img src="{{ asset('elearning/img/visi.png') }}" class="img-fluid" alt=""> --}}
                        <h2>Visi</h2>
                        <div class="text-wrap">
                            <p>{!! $hubi_visi->visi !!}</p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center text-center mb-3 wow fadeInUp" data-wow-delay="0.15">
                    <div class="col-lg-7 col-md-12">
                        <div class="d-flex justify-content-center align-items-center">
                            <div id="hi-misi-animasi" style="width: 300px;"></div>
                        </div>
                        {{-- <img src="{{ asset('elearning/img/visi.png') }}" class="img-fluid" alt=""> --}}
                        <h2>Misi</h2>
                        <div class="text-wrap">
                            <p>{!! $hubi_visi->misi !!}</p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center text-center mb-3 wow fadeInUp" data-wow-delay="0.15">
                    <div class="col-lg-7 col-md-12">
                        <div class="d-flex justify-content-center align-items-center">
                            <div id="hi-tujuan-animasi" style="width: 300px;"></div>
                        </div>
                        {{-- <img src="{{ asset('elearning/img/visi.png') }}" class="img-fluid" alt=""> --}}
                        <h2>Misi</h2>
                        <div class="text-wrap">
                            <p>{!! $hubi_visi->tujuan !!}</p>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Team End -->
@endsection
