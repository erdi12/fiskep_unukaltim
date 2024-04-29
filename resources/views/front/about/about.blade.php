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
                <div class="text-center wow fadeInDown" data-wow-delay="0.15">
                    <h2>Visi, Misi, dan Tujuan</h2>
                    <p>VISI, MISI SERTA TUJUAN DAN FAKULTAS ILMU SOSIAL DAN KEPENDIDIKAN UNIVERSITAS NAHDLATUL ULAMA KALIMANTAN TIMUR</p>
                </div>
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
                            <h5 class="mb-3">Visi</h5>
                            <div class="text-start">
                                <p>{!! $visimisi->visi !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-globe text-primary mb-4"></i>
                            <h5 class="mb-3">Misi</h5>
                            <div class="text-start">
                                <p>{!! $visimisi->misi !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa-solid fa-3x fa-arrows-down-to-people text-primary mb-4"></i>
                            <h5 class="mb-3">Tujuan</h5>
                            <div class="text-start">
                                <p>{!! $visimisi->tujuan !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                {{-- <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-book-open text-primary mb-4"></i>
                            <h5 class="mb-3">Book Library</h5>
                            <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- Service End -->
@endsection