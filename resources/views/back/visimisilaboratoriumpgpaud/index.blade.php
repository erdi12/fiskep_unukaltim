@extends('layouts.default')
@section('visimisilaboratoriumpgpaud', 'active')
@section('menu', 'show')
@section('visimisi', 'active')

@section('content')
<div class="panel-header bg-primary-gradient">
	<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div>
				<h2 class="text-white pb-2 fw-bold">Visi Misi Ilmu Komunikasi</h2>
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
						<div class="card-title">Visi Misi Laboratorium PG-PAUD</div>
					</div>
				</div>
				<div class="card-body">
					@if (Session::has('success'))
						<div class="alert alert-primary">
							{{ Session('success') }}
						</div>
					@endif
					<div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="text-center">
                                <tr>
                                    <th>Visi</th>
                                    <th>Misi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($visimisilaboratoriumpgpaud as $row)
                                    <tr>
                                        <td>{{ $row->visi }}</td>
                                        <td>{{ $row->misi }}</td>
                                        <td class="text-center">
											<a href="{{ route('visimisilaboratoriumpgpapud.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
										</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Data Masih Kosong</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection