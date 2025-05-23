    @extends('front.layouts.frontend')
    @section('content')
    @include('front.includes.slider')

    {{-- <div id="myModal" class="modal fade" tabindex="-1" data-backdrop="static">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($iklan as $key => $row)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <img src="{{ asset('uploads/'.$row->gambar_iklan) }}" class="img-fluid" alt="...">
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Categories Start -->
    <div class="container-xxl py-5 category">
        <div class="container">
            {{-- <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Program Studi</h6>
                <h1 class="mb-5">Program Studi Unggulan</h1>
            </div> --}}
            <div class="row justify-content-center text-center">
                <div class="col-lg-4 col-md-6 mb-3 mt-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="card border-0 p-3 position-relative">
                        <div class="card-body">
                            <div class="d-flex justify-content-center align-items-center">
                                <div id="isi-krs-animasi" class="card-img-top img-fluid rounded-circle position-absolute top-0 start-50 translate-middle" style="width: 35%"></div>
                            </div>
                            <h5 class="card-title mt-5 pt-3">Pengisian KRS</h5>
                            <p class="card-text">Jangan lupa isi KRSnya ya :)</p>
                            <a href="https://unukaltim.siakad.my.id/isikrs" target="_blank" class="btn btn-dark">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-3 mt-4 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="card border-0 p-3 mt-3 mt-md-0 position-relative">
                        <div class="card-body">
                            <div class="d-flex justify-content-center align-items-center">
                                <div id="siakad-animasi" class="card-img-top img-fluid rounded-circle position-absolute top-0 start-50 translate-middle" style="width: 40%"></div>
                            </div>
                            <h5 class="card-title mt-5 pt-3">SIAKAD</h5>
                            <p class="card-text">Untuk cek jadwal dan dosen disini ya 😊</p>
                            <a href="https://unukaltim.siakad.my.id" target="_blank" class="btn btn-dark">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-3 mt-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="card border-0 p-3 mt-3 mt-md-0 position-relative">
                        <div class="card-body">
                            <div class="d-flex justify-content-center align-items-center">
                                <div id="elearning-animasi" class="card-img-top img-fluid rounded-circle position-absolute top-0 start-50 translate-middle" style="width: 35%"></div>
                            </div>
                            <h5 class="card-title mt-5 pt-3">E-Learning</h5>
                            <p class="card-text">Disini tempat ujian onlinenya 🤓</p>
                            <a href="https://elearning.unukaltim.ac.id" target="_blank" class="btn btn-dark">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-3 mt-4 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="card border-0 p-3 mt-3 mt-md-3 position-relative">
                        <div class="card-body">
                            <div class="d-flex justify-content-center align-items-center">
                                <div id="perpustakaan-animasi" class="card-img-top img-fluid rounded-circle position-absolute top-0 start-50 translate-middle" style="width: 35%"></div>
                            </div>
                            <h5 class="card-title mt-5 pt-3">Perpustakaan</h5>
                            <p class="card-text">Disini tempat untuk baca buku penunjangmu ya 😁</p>
                            <a href="https://olib.unukaltim.ac.id" target="_blank" class="btn btn-dark">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Categories Start -->

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img src="{{ asset('elearning/img/dekan.jpeg')}}" class="img-fluid rounded-2 position-absolute w-100 h-100" alt="" style="object-fit: scale-down;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3 mt-5">Sambutan</h6>
                    <h1 class="mb-4">Dekan Fakultas Ilmu Sosial dan Kependidikan</h1>
                    <p class="mb-4">Fakultas Ilmu Sosial dan Kependidikan di Kampus ini merupakan wahana pembelajaran yang berkomitmen untuk memberikan pendidikan tinggi dengan nilai-nilai keislaman yang kuat. Sebagai Dekan, saya bersama seluruh staf akademis dan administratif memiliki tekad untuk menciptakan lingkungan belajar yang inklusif, inovatif, dan berorientasi pada karakter.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Categories Start -->
    <div class="container-xxl py-5 category">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Program Studi</h6>
                <h1 class="mb-5">Program Studi Unggulan</h1>
            </div>
            <div class="row justify-content-center text-center wow fadeInUp">
                <div class="col-lg-4 col-md-6 mb-3">
                    <div class="service-item text-center">
                        <div class="p-4">
                            <img src="{{asset('back/img/unu-kaltim.png')}}" style="width: 30%" class="card-img-top img-fluid" alt="...">
                            <h5>Hubungan Internasional</h5>
                            <p>Program Sarjana (S-1)</p>
                            <a href="{{ route('hubi') }}" class="btn btn-dark">Lihat Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-3">
                    <div class="service-item text-center">
                        <div class="p-4">
                            <img src="{{asset('back/img/unu-kaltim.png')}}" style="width: 30%" class="card-img-top img-fluid" alt="...">
                            <h5>Ilmu Komunikasi</h5>
                            <p>Program Sarjana (S-1)</p>
                            <a href="{{ route('mukom') }}" class="btn btn-dark">Lihat Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item text-center">
                        <div class="p-4">
                            <img src="{{asset('back/img/unu-kaltim.png')}}" style="width: 30%" class="card-img-top img-fluid" alt="...">
                            <h6 class="card-title">Pendidikan Guru - Pendidikan Anak Usia Dini</h6>
                            <p class="card-text">Program Sarjana (S-1)</p>
                            <a href="{{ route('guru') }}" class="btn btn-dark">lihat Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Categories Start -->


    <!-- Berita Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Berita</h6>
                <h1 class="mb-5">Berita Saat Ini</h1>
            </div>
            <div class="row g-4 justify-content-center">
                @foreach ($articles as $art)
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="course-item bg-light">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid" src="{{ asset('uploads/'.$art->gambar_artikel)}} " alt="">
                                
                            </div>
                            <div class="text-start p-4 pb-0">
                                <h4 class="mb-0">{{ $art->judul }}</h4>
                                <small class="mb-4">{!! Str::limit($art->body, 100) !!}</small>
                            </div>
                            <div class="d-flex justify-content-center mb-4">
                                <a href="{{ route('detail-artikel', $art->slug) }}" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 30px">Read More</a>
                            </div>
                            <div class="d-flex border-top">
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>{{ $art->users->name }}</small>
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>{{ $art->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                    </div>  
                @endforeach
                <div class="d-flex justify-content-center">
                    <a href="{{ route('berita') }}" class="btn btn-primary wow fadeInUp" data-wow-delay="0.3s">Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Berita End -->


    {{-- <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Instructors</h6>
                <h1 class="mb-5">Expert Instructors</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ asset('elearning/img/team-1.jpg')}}" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Instructor Name</h5>
                            <small>Designation</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ asset('elearning/img/team-2.jpg')}}" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Instructor Name</h5>
                            <small>Designation</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ asset('elearning/img/team-3.jpg')}}" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Instructor Name</h5>
                            <small>Designation</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ asset('elearning/img/team-4.jpg')}}" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Instructor Name</h5>
                            <small>Designation</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End --> --}}


    <!-- Testimonial Start -->
    {{-- <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="section-title bg-white text-center text-primary px-3">Testimonial</h6>
                <h1 class="mb-5">Our Students Say!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel position-relative">
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="{{ asset("elearning/img/testimonial-1.jpg") }}" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="{{ asset("elearning/img/testimonial-2.jpg") }}" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="{{ asset("elearning/img/testimonial-3.jpg") }}" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="{{ asset("elearning/img/testimonial-4.jpg") }}" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Testimonial End -->
@endsection