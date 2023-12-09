@extends('layouts.main')
@section('content')
    <!-- Title page -->
    <section class="bg-img1 txt-center p-lr-15 p-tb-92"
        style="background-image: url('img/delicious-cookies-arrangement.jpg');">
        <h2 class="ltext-105 cl0 txt-center">
            Masuk
        </h2>
    </section>

    <div id="login-card" class="container bg-white border rounded">
        <form action="{{ route('login.attempt') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Masukkan email anda, contoh example@mail.com</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <p>Belum punya akun? <a href="{{ route('register') }}">Daftar</a></p>
            </div>
            <button type="submit" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                Login
            </button>
        </form>
    </div>
@endsection
