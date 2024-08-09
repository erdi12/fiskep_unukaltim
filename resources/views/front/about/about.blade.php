@extends('front.layouts.frontend')

@section('content')
    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4 justify-content-center">
                <div class="text-center wow fadeInDown" data-wow-delay="0.15">
                    <h2>Struktur Organisasi Fakultas</h2>
                    <div class="row justify-content-center mb-4">
                        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="team-item bg-light">
                                <div class="overflow-hidden">
                                    <img class="img-fluid" src="{{ asset('uploads/'.$dekan->foto_dekan) }}" alt="">
                                </div>
                                <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                                    <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                        <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                        <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                        <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                                <div class="text-center p-4">
                                    <h5 class="mb-0"> {{ $dekan->nama}} </h5>
                                    <small> {{ $dekan->jabatan->nama_jabatan }} </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center mb-4">
                        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="team-item bg-light">
                                <div class="overflow-hidden">
                                    <img class="img-fluid" src="{{ asset('uploads/'.$tendik->foto_dekan) }}" alt="">
                                </div>
                                <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                                    <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                        <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                        <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                        <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                                <div class="text-center p-4">
                                    <h5 class="mb-0"> {{ $tendik->nama}} </h5>
                                    <small> {{ $tendik->jabatan->nama_jabatan }} </small>
                                </div>
                            </div>
                        </div>
                    </div><hr>
                    <div class="row justify-content-center mb-4">
                        <h1>Hubungan Internasional</h1>    
                        @foreach ($hi as $item)
                        <div class="col-lg-3 col-md-6 mb-4 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="team-item bg-light">
                                <div class="overflow-hidden">
                                    <img class="img-fluid" src="{{ asset('uploads/'.$item->foto) }}" alt="">
                                </div>
                                <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                                    <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                        <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                        <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                        <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                                <div class="text-center p-4">
                                    <h5 class="mb-0"> {{ $item->nama}} </h5>
                                    <small> {{ $item->jabatan->nama_jabatan }} </small>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div><hr>
                    <div class="row justify-content-center mb-4">
                        <h1>Ilmu Komunikasi</h1>
                        @foreach ($ilkom as $ilkom_item)
                            <div class="col-lg-3 col-md-6 mb-4 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="team-item bg-light">
                                    <div class="overflow-hidden">
                                        <img class="img-fluid" src="{{ asset('uploads/'.$ilkom_item->foto) }}" alt="">
                                    </div>
                                    <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                                        <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                                        </div>
                                    </div>
                                    <div class="text-center p-4">
                                        <h5 class="mb-0"> {{ $ilkom_item->nama}} </h5>
                                        <small> {{ $ilkom_item->jabatan->nama_jabatan }} </small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div><hr>
                    <div class="row justify-content-center mb-4">
                        <h1>Pendidikan Anak Usia Dini</h1>
                        @foreach ($paud as $item_paud)
                            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="team-item bg-light">
                                    <div class="overflow-hidden">
                                        <img class="img-fluid" src="{{ asset('uploads/'.$item_paud->foto) }}" alt="">
                                    </div>
                                    <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                                        <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                                        </div>
                                    </div>
                                    <div class="text-center p-4">
                                        <h5 class="mb-0"> {{ $item_paud->nama}} </h5>
                                        <small> {{ $item_paud->jabatan->nama_jabatan }} </small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        
                    </div>
                </div>
                @if ($visimisi)
                <div class="text-center wow fadeInUp" data-wow-delay="0.15">
                    <h2>Visi, Misi dan Tujuan</h2>
                    <p>VISI, MISI SERTA TUJUAN DAN FAKULTAS ILMU SOSIAL DAN KEPENDIDIKAN UNIVERSITAS NAHDLATUL ULAMA KALIMANTAN TIMUR</p>
                </div>
                <div class="row justify-content-center text-center mb-3 wow fadeInUp" data-wow-delay="0.15">
                    <div class="col-lg-7 col-md-12">
                        <div class="d-flex justify-content-center align-items-center">
                            <div id="fiskep-visi-animasi" style="width: 300px;"></div>
                        </div>
                        {{-- <img src="{{ asset('elearning/img/visi.png') }}" class="img-fluid" alt=""> --}}
                        <h2>Visi</h2>
                        <div class="text-wrap">
                            <p>{!! $visimisi->visi !!}</p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center text-center mb-3 wow fadeInUp" data-wow-delay="0.15">
                    <div class="col-lg-7 col-md-12">
                        <div class="d-flex justify-content-center align-items-center">
                            <div id="fiskep-misi-animasi" style="width: 300px;"></div>
                        </div>
                        {{-- <img src="{{ asset('elearning/img/visi.png') }}" class="img-fluid" alt=""> --}}
                        <h2>Misi</h2>
                        <div class="text-wrap">
                            <p>{!! $visimisi->misi !!}</p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center text-center mb-3 wow fadeInUp" data-wow-delay="0.15">
                    <div class="col-lg-7 col-md-12">
                        <div class="d-flex justify-content-center align-items-center">
                            <div id="fiskep-tujuan-animasi" style="width: 300px;"></div>
                        </div>
                        {{-- <img src="{{ asset('elearning/img/visi.png') }}" class="img-fluid" alt=""> --}}
                        <h2>Tujuan</h2>
                        <div class="text-wrap">
                            <p>{!! $visimisi->tujuan !!}</p>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Service End -->
@endsection