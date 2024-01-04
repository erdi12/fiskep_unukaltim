@extends('layouts.default')

@section('content')
<div class="panel-header bg-primary-gradient">
	<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div>
				<h2 class="text-white pb-2 fw-bold">Kategori</h2>
			</div>
			<div class="ml-md-auto py-2 py-md-0">
				{{-- <a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a>
				<a href="#" class="btn btn-secondary btn-round">Add Customer</a> --}}
			</div>
		</div>
	</div>
</div>
<div class="page-inner mt--5">
	<div class="row">
		<div class="col-md-12">
			<div class="card full-height">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title">Data Playlist {{ $playlist->judul_playlist }}</div>
                        <a href="{{ route('playlist.index') }}" class="btn btn-warning btn-sm ml-auto"><i class="fa fa-arrow-left"></i> Back</a>
					</div>
				</div>
				<div class="card-body">
					{{-- @if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif --}}
					<form method="POST" action="{{ route('playlist.update', $playlist->id) }}" enctype="multipart/form-data">
						@csrf
                        @method('PUT')
						<div class="form-group">
							<label for="judul">Nama Playlist Video</label>
							<input type="text" name="judul_playlist" class="form-control" id="judul_playlist" placeholder="Masukkan Judul Playlist" value="{{ $playlist->judul_playlist }}">
						</div>
                        <div class="form-group">
                            <label for="body">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi_playlist" class="form-control">{{ $playlist->deskripsi }}</textarea>
                        </div>
                        {{-- <div class="form-group">
                            <label for="gambar">Gambar playlist</label>
                            <input type="file" name="gambar_playlist" class="form-control" accept="image/png, image/gif, image/jpeg, image/jpg">
							@error('gambar_playlist')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div> --}}
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="is_active" class="form-control">
                                <option value="1" {{ $playlist->is_active == '1' ? 'selected' : '' }} >Publish</option>
                                <option value="0" {{ $playlist->is_active == '0' ? 'selected' : '' }}>Draft</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar Artikel</label>
                            <input type="file" name="gambar_playlist" class="form-control" accept="image/png, image/gif, image/jpeg, image/jpg"><br>
                            @error('gambar_playlist')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <label for="gambar">Gambar Saat Ini</label><br class="mb-2">
                            <img src="{{ asset('uploads/'.$playlist->gambar_playlist) }}" width="150" class="img-fluid">                            
                        </div>
						<div class="form-group">
							<button class="btn btn-primary btn-sm" type="submit">Simpan Data</button>
							<button class="btn btn-danger btn-sm" type="reset">Reset Data</button>
						</div>
					</form>                    
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

