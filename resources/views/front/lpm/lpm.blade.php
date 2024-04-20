@extends('front.layouts.frontend')
@section('lembaga', 'active')
@section('lpm', 'active')

@section('content')
    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Lembaga Penjaminan Mutu</h6>
                {{-- <h1 class="mb-5">Expert Lecturer</h1> --}}
            </div>
            <div class="row justify-content-center mb-4">
                <div class="col-lg-8 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">No</th>
                                <th scope="col" class="text-center">Nama</th>
                                <th scope="col" class="text-center">Link</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lpm as $row)
                                <tr>
                                    <th class="text-center">{{ $loop->iteration }}</th>
                                    <td>{{ $row->nama }}</td>
                                    <td class="text-center">
                                        <a href="{{ $row->link }}" target="_blank">Klk Disini</a>
                                    </td>
                                </tr>
                            @endforeach                            
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
    <!-- Team End -->
@endsection
