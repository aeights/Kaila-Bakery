@extends('layouts.admin')
@section('content')
@include('partials.admin.modal.modal-confirm-delete-slider')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Banner</h3>
                <p class="text-subtitle text-muted">Pengaturan banner untuk landing page</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Banner</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <p>Semua Banner</p>
                <div>
                    <a href="{{ route('dashboard.admin.add-banner') }}" class="btn btn-primary">Tambah</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="slider-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Sub Judul</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($banners) != 0)
                        @foreach ($banners as $no => $item)  
                        <tr>
                            <td>{{ $no+1 }}</td>
                            <td>
                                <div class="rounded" style="width: 100px; height: 100px;">
                                    <img class="object-fit-cover w-100 h-100 rounded" src="{{ $item->getFirstMediaUrl('banner') }}" alt="{{ $item->title }}">
                                </div>
                            </td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->sub_title }}</td>
                            <td>
                                <form id="form-delete-banner" action="{{ route('dashboard.admin.delete-banner',['id' => $item->id]) }}" method="POST">
                                    @csrf
                                    <a class="btn btn-success" href="{{ route('dashboard.admin.edit-banner',['id' => $item->id]) }}">Edit</a>
                                    <button class="btn btn-danger" type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td></td>
                            <td></td>
                            <td>Tidak Ada Data</td>
                            <td></td>
                            <td></td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
@endsection
@push('scripts')
    
@endpush