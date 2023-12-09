@extends('layouts.admin')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Banner</h3>
                    <p class="text-subtitle text-muted">Edit banner untuk landing page</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Banner</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Banner</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('dashboard.admin.update-banner') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col">
                            <input type="hidden" name="id" value="{{ request('id') }}">
                            <div class="form-group">
                                <label for="basicInput">Judul</label>
                                <input value="{{ $banner->title }}" name="title" type="text" class="form-control" id="basicInput" placeholder="Masukkan judul banner">
                            </div>
                            <div class="form-group">
                                <label for="basicInput">Sub Judul</label>
                                <input value="{{ $banner->sub_title }}" name="sub_title" type="text" class="form-control" id="basicInput" placeholder="Masukkan sub judul banner">
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Gambar Banner</label>
                                <input name="image" class="form-control" type="file" id="formFile">
                            </div>
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
