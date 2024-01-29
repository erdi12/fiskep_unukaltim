@extends('front2.layouts.frontend')
@include('front2.includes.slider')

@section('content')
<div class="row">
    @foreach ($article as $art)        
        <div class="col-md-4 mt-3">
            <div class="card">
                <img src="{{ asset('uploads/'.$art->gambar_artikel) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    
                    <h5 class="card-title">
                        <a href="{{ route('detail-artikel', $art->slug) }}" style="text-decoration: none;">
                            {{ $art->judul }}
                        </a>
                    </h5>
                    <p>{{ $art->updated_at->diffForHumans() }}</p>
                    <p class="">{!! Str::limit($art->body, 100) !!}</p>
                </div>
                <div class="card-body">
                    <a href="#" class="card-link"> {{ $art->users->name }} </a>
                    <a href="#" class="card-link">{{ $art->kategori->nama_kategori }}</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection