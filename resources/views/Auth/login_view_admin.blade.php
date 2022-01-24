@extends('Layout.main_auth_admin')

@section('container_auth')

    {{-- Tampilan Berhasil Register --}}
    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif

    {{-- Tampilan Berhasil Register --}}
    @if(session()->has('loginError'))
    <div class="alert alert-danger" role="alert">
        {{ session('loginError') }}
    </div>
    @endif
        
<form action="/admin/login" method="POST" class="mb-3">
    @csrf
    <div class="form-floating mb-3">
        <input type="text" class="form-control rounded-0" placeholder="Username" id="username" name="username">
        <label for="username">Username</label>
    </div>
    <div class="form-floating mb-3">
        <input type="password" class="form-control rounded-0" placeholder="Test" id="password" name="password">
        <label for="password">Password</label>
    </div>
    <div class="forgot-password-link mb-3 text-end">
        <a href="#" title="Lupa Password" class="text-decoration-none">Lupa Password?</a>
    </div>
    <div class="d-grid gap-2 mb-3">
        <button type="submit" class="btn btn-primary border-0 rounded-0">Login</button>
    </div>
</form>

<div class="sign-up-accounts text-center">
    <a href="/admin/register" title="Register" class="text-decoration-none">Register</a>
</div>

@endsection
