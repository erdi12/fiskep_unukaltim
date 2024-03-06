@extends('layouts.default')
@section('visimisipgpaud', 'active')
@section('menu', 'show')
@section('visimisi', 'active')

@section('content')
<div class="panel-header bg-primary-gradient">
	<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div>
				<h2 class="text-white pb-2 fw-bold">Pendidikan Guru - Pendidikan Anak Usia Dini</h2>
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
						<div class="card-title">Edit Pendidikan Guru - Pendidikan Anak Usia Dini <i></i></div>
                        <a href="{{ route('visimisipgpaud.index') }}" class="btn btn-warning btn-sm ml-auto"><i class="fa fa-arrow-left"></i> Back</a>
					</div>
				</div>
				<div class="card-body">
					<form method="POST" action="{{ route('visimisipgpaud.update', $visimisipgpaud->id) }}" enctype="multipart/form-data">
						@csrf
                        @method('PUT')
						<div class="form-group">
							<label for="judul">Visi</label>
							<textarea id="visi" name="visi" class="form-control" id="text">{{ $visimisipgpaud->visi }}</textarea>
						</div>
                        <div class="form-group">
                            <label for="body">Misi</label>
                            <textarea id="misi" name="misi" class="form-control">{{ $visimisipgpaud->misi }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="body">Tujuan</label>
                            <textarea id="tujuan" name="tujuan" class="form-control">{{ $visimisipgpaud->tujuan }}</textarea>
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