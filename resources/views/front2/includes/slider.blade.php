{{-- Slider Start --}}
<section id="slider">
    <div class="container">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                    @foreach ($slide as $row)            
                    <div class="carousel-item active" style="margin-top: 4.4rem;">
                        <img src="{{ asset('uploads/'.$row->gambar_slide) }}" class="d-block img-fluid" alt="...">
                    </div>
                    {{-- <div class="carousel-item">
                        <img src="{{ asset('back/img/blogpost.jpg') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('back/img/bg-404.jpeg') }}" class="d-block w-100" alt="...">
                    </div> --}}
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
    </div>
</section>
{{-- Slider End --}}