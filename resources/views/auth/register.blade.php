@extends('layouts.main')
@section('content')
    <!-- Title page -->
    <section class="bg-img1 txt-center p-lr-15 p-tb-92"
        style="background-image: url('img/delicious-cookies-arrangement.jpg');">
        <h2 class="ltext-105 cl0 txt-center">
            Daftar
        </h2>
    </section>

    <div id="login-card" class="container bg-white border rounded">
        <form action="{{ route('register.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama</label>
                <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan nama anda">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nomor Telepon</label>
                <input name="phone" type="text" class="form-control" id="exampleInputEmail1" placeholder="Contoh: 085123456789">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="example@mail.com">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                <textarea name="address" class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
            </div>
            <div class="mb-3">
                <p>Sudah punya akun? <a href="{{ route('login') }}">Masuk</a></p>
            </div>
            <button type="submit" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                Daftar
            </button>
        </form>
    </div>
@endsection
