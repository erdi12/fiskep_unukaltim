@extends('front.layouts.frontend')
@section('berita', 'active')
@section('content')
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Berita</h6>
                <h1 class="mb-5">{{ $category->nama_kategori }}</h1>
            </div>
            <div class="row g-4 justify-content-center">
                @foreach ($artikels as $art)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="course-item bg-light">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid" src="{{ asset('uploads/'.$art->gambar_artikel)}} " alt="">
                                <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                    <a href="{{ route('detail-artikel', $art->slug) }}" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 30px">Read More</a>
                                </div>
                            </div>
                            <div class="text-center p-4 pb-0">
                                <h3 class="mb-0">{{ $art->judul }}</h3>
                                <span class="badge bg-secondary mb-3" style="border-radius: 30px;">{{ $art->kategori->nama_kategori }}</span>
                                {{-- <h5 class="mb-4">{!! Str::limit($art->body, 100) !!}</h5> --}}
                            </div>
                            <div class="d-flex border-top">
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>{{ $art->users->name }}</small>
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>{{ $art->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                    </div>  
                @endforeach
                {{-- <div class="d-flex justify-content-center wow fadeInUp">
                    {{$artikels->links()}}
                </div> --}}
            </div>
        </div>
    </div>
@endsection