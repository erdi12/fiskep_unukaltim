@extends('front.layouts.frontend')

@section('content')
    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4 justify-content-center">
                @if ($visimisi)
                <div class="text-center wow fadeInDown" data-wow-delay="0.15">
                    <h2>Visi, Misi, dan Tujuan</h2>
                    <p>VISI, MISI SERTA TUJUAN DAN FAKULTAS ILMU SOSIAL DAN KEPENDIDIKAN UNIVERSITAS NAHDLATUL ULAMA KALIMANTAN TIMUR</p>
                </div>
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
                            <h5 class="mb-3">Skilled Instructors</h5>
                            <p>{!! $visimisi->visi !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-globe text-primary mb-4"></i>
                            <h5 class="mb-3">Online Classes</h5>
                            <p>{!! $visimisi->misi !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa-solid fa-3x fa-arrows-down-to-people text-primary mb-4"></i>
                            <h5 class="mb-3">Home Projects</h5>
                            <p>{!! $visimisi->tujuan !!}</p>
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