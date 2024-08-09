@extends('front.layouts.frontend')
@section('fasilitas', 'active')
@section('fasilitas_pgpaud', 'active')

@section('content')
    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Laboratorium Pendidikan Guru - Pendidikan Anak Usia Dini</h6>
                <h1 class="mb-5">Struktur Organisasi Laboratorium Pendidikan Guru - Pendidikan Anak Usia Dini</h1>
            </div>
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
                            <small>
                                @if ($dekan->jabatan->nama_jabatan == 'Dekan')
                                Penanggung Jawab Fakultas
                                @endif
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    @foreach ($kaprodi as $item)    
                        <div class="team-item bg-light mb-3">
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
                                <small> 
                                    @if ($item->jabatan->nama_jabatan == 'Ketua Program Studi')
                                    Penanggung Jawab Program Studi
                                    @elseif ($item->jabatan->nama_jabatan == 'Laboran')
                                        Kepala Laboran
                                    @endif 
                                </small>
                            </div>
                        </div>
                    @endforeach                        
                </div>
            </div>
            <div class="row justify-content-center g-4">       
                @foreach ($koor_laboran as $row)
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item bg-light mb-3">
                            <div class="overflow-hidden">
                                <img class="img-fluid" src="{{ asset('uploads/'.$row->foto) }}" alt="">
                            </div>
                            <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                                <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                    <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="text-center p-4">
                                <h5 class="mb-0"> {{ $row->nama}} </h5>
                                <small> {{ $row->jabatan->nama_jabatan }} </small>
                            </div>
                        </div>
                    </div>
                @endforeach        
                    
            </div>
            <div class="row justify-content-center g-4 mb-4">
                @foreach ($laboran as $row)                    
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item bg-light">
                            <div class="overflow-hidden">
                                <img class="img-fluid" src="{{ asset('uploads/'.$row->foto) }}" alt="">
                            </div>
                            <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                                <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                    <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                                </div>
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
                @if ($visimisilaboratoriumpgpaud)
                <div class="text-center wow fadeInDown" data-wow-delay="0.15">
                    <h2>VISI & MISI LABORATORIUM PG-PAUD</h2>
                    <p>FAKULTAS ILMU SOSIAL DAN KEPENDIDIKAN UNIVERSITAS NAHDLATUL ULAMA KALIMANTAN TIMUR</p>
                </div>
                <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h3 class="mb-3 text-center">Visi</h3>
                    <div class="text-center">

                        <i class="fa fa-3x fa-graduation-cap text-center text-primary mb-4"></i>
                    </div>
                    <div class="text-start">
                        <p>{!! $visimisilaboratoriumpgpaud->visi !!}</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h3 class="mb-3 text-center">Misi</h3>
                    <div class="text-center">

                        <i class="fa fa-3x fa-globe text-center text-primary mb-4"></i>
                    </div>
                    <div class="text-start">
                        <p>{!! $visimisilaboratoriumpgpaud->misi !!}</p>
                    </div>
                </div>
                {{-- <div class="col-lg-6 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
                            <h5 class="mb-3">Visi</h5>
                            <div class="text-start">
                                <p>{!! $visimisilaboratoriumpgpaud->visi !!}</p>
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
                                <p>{!! $visimisilaboratoriumpgpaud->misi !!}</p>
                            </div>
                        </div>
                    </div>
                </div>   --}}
                @endif
            </div>
        </div>
    </div>
    <!-- Team End -->
@endsection