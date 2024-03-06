@extends('front.layouts.frontend')
@section('berita', 'active')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-8 mt-4">
            <div class="div">
                <img src="{{ asset('uploads/'.$article->gambar_artikel) }}" alt="" class="img-fluid">
            </div>
            {{-- <div class="detail-content mt-2 p-4">
                <div class="detail-badge">
                    <button class="btn btn-danger">{{$article->kategori->nama_kategori}}</button>
                    <button class="btn btn-primary">{{$article->users->name}}</button>
                    <span class="badge badge-dark">uhuy</span>
                </div>
                <h2>{{ $article->judul }}</h2>
            </div> --}}
            <div class="mt-2 p-4">
                <span class="badge bg-secondary">{{$article->created_at->format('d M Y H:i:s')}}</span>
                <span class="badge bg-warning text-dark">{{$article->kategori->nama_kategori}}</span>
                <span class="badge bg-primary">{{$article->users->name}}</span>
                <span class="badge bg-primary">Total Views: {{$article->views}}</span>
                <hr>
                <h2>{{ $article->judul }}</h2>
                <p align="justify">{!!$article->body!!}</p>
            </div>
        </div>
        <div class="col-lg-4 mt-4">
            <h4>Iklan</h4><hr>
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
            <h4 class="mt-4">Kategori</h4><hr>
            @foreach ($category as $cat)
            <div class="d-flex flex-wrap">
                    <a href="{{ route('kategori-berita', ['kategoriSlug' => $cat->slug]) }}">
                        <p>{{ $cat->nama_kategori }}</p>
                    </a><br>
                    <p class="ms-auto text-right"><span class="badge bg-dark">{{ $cat->articles->count() }}</span></p>
                </div>
            @endforeach
            <h4 class="mt-4">Berita Terbaru</h4><hr>
            @foreach ($articleTerbaru as $pop)
                <div class="course-item bg-light mb-3">
                    <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="{{ asset('uploads/'.$pop->gambar_artikel)}} " alt="">
                            <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                <a href="{{ route('detail-artikel', $pop->slug) }}" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 30px">Read More</a>
                            </div>
                    </div>
                    <div class="text-center p-4 pb-0">
                        <h3 class="mb-0">{{ $pop->judul }}</h3>
                        <span class="badge bg-secondary mb-3" style="border-radius: 30px;">{{ $pop->kategori->nama_kategori }}</span>
                        {{-- <h5 class="mb-4">{!! Str::limit($art->body, 100) !!}</h5> --}}
                    </div>
                    {{-- <div class="d-flex border-top">
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>{{ $pop->users->name }}</small>
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>{{ $pop->created_at->diffForHumans() }}</small>
                    </div> --}}
                </div>
            @endforeach
        </div>
    </div>
</div>
    
@endsection