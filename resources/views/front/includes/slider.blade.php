<!-- Carousel Start -->
<div class="container-fluid p-0">
    <div class="owl-carousel header-carousel position-relative">
        @foreach ($slide as $row)            
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{ asset('uploads/'.$row->gambar_slide) }} " alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Selamat Datang</h5>
                                <h1 class="display-3 text-white animated slideInDown">Fakultas Ilmu Sosial dan Ilmu Kependidikan</h1>
                                <p class="fs-5 text-white mb-4 pb-2">Transforming Islamic Values for a Sustainable Future</p>
                                <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Register PMB</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


<!-- Carousel End -->