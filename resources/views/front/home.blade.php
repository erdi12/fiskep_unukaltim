@extends('front.layouts.frontend')

@section('content')
<div class="row">
    @foreach ($article as $art)        
        <div class="col-md-4 mt-3">
            <div class="card">
                <img src="{{ asset('uploads/'.$art->gambar_artikel) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $art->judul }}</h5>
                    <p class="card-text">{!! $art->body !!}</p>
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