@extends('front.layouts.frontend')
@section('menu', 'active')

@section('content')
    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Pendidikan Guru - Pendidikan Anak Usia Dini</h6>
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
                <div class="text-center wow fadeInDown" data-wow-delay="0.15">
                    <h2>Visi, Misi, dan Tujuan</h2>
                    <p>VISI, MISI SERTA TUJUAN PENDIDIKAN GURU - PENDIDIKAN ANAK USIA DINI</p>
                </div>
                <div class="row text-center wow fadeInUp" data-wow-delay="0.15">
                    <div class="col-lg-12 col-md-6">
                        <div class="p-4">
                            <h5 class="mb-3">Visi</h5>
                            <i class="fa fa-3x fa-graduation-cap text-primary mb-2"></i>
                            <div class="text-start">
                                <p>{!! $guru_visimisi->visi !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row text-center wow fadeInUp" data-wow-delay="0.15">
                    <div class="col-lg-12 col-md-6">
                        <div class="p-4">
                            <h5 class="mb-3">Misi</h5>
                            <i class="fa fa-3x fa-globe text-primary mb-2"></i>
                            <div class="text-start">
                                <p>{!! $guru_visimisi->misi !!}</p>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="row text-center wow fadeInUp" data-wow-delay="0.15">
                    <div class="col-lg-12 col-md-6">
                        <div class="p-4">
                            <h5 class="mb-3">Tujuan</h5>
                            <i class="fa fa-3x fa-arrows-down-to-people text-primary mb-2"></i>
                            <div class="text-start">
                                <p>{!! $guru_visimisi->tujuan !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Team End -->
@endsection
