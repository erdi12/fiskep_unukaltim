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
						<div class="card-title">Edit materi <i>{{ $materi->judul_materi }}</i></div>
                        <a href="{{ route('materi.index') }}" class="btn btn-warning btn-sm ml-auto"><i class="fa fa-arrow-left"></i> Back</a>
					</div>
				</div>
				<div class="card-body">
					<form method="POST" action="{{ route('materi.update', $materi->id) }}" enctype="multipart/form-data">
						@csrf
                        @method('PUT')
						<div class="form-group">
							<label for="judul">Nama Judul</label>
							<input type="text" name="judul_materi" class="form-control" id="text" value="{{ $materi->judul_materi }}">
						</div>
                        <div class="form-group">
                            <label for="body">Deskripsi</label>
                            <textarea id="deskripsi_materi" name="deskripsi" class="form-control">{{ $materi->deskripsi }}</textarea>
                        </div>
                        <div class="form-group">
							<label for="kategori">Playlist</label>
							<select type="text" name="playlist_id" class="form-control" id="text">
                                @foreach ($playlist as $row)
                                    @if ($row->id == $materi->playlist_id)                                        
                                        <option value="{{ $row->id }}" selected="selected">{{ $row->judul_playlist }}</option>
                                    @else
                                        <option value="{{ $row->id }}">{{ $row->judul_playlist }}</option>
                                    @endif
                                @endforeach                                
                            </select>
						</div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="is_active" class="form-control">
                                <option value="1" {{ $materi->is_active == '1' ? 'selected' : '' }} >Publish</option>
                                <option value="0" {{ $materi->is_active == '0' ? 'selected' : '' }}>Draft</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar materi</label>
                            <input type="file" name="gambar_materi" class="form-control" accept="image/png, image/gif, image/jpeg, image/jpg">
							@error('gambar_materi')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
							<br>
                            <label for="gambar">Gambar Saat Ini</label><br class="mb-2">
                            <img src="{{ asset('uploads/'.$materi->gambar_materi) }}" width="150" class="img-fluid">
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