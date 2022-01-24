@extends('Layout.main_auth_admin')

@section('container_auth')

<form action="/admin/register" method="POST" class="mb-3">
    @csrf
    <div class="form-floating mb-3">
        <input type="text" class="form-control rounded-0" placeholder="Nama Depan" id="first_name" name="first_name">
        <label for="first_name">Nama Depan</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control rounded-0" placeholder="Nama Belakang" id="last_name" name="last_name">
        <label for="last_name">Nama Belakang</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control rounded-0" placeholder="Username" id="username" name="username">
        <label for="username">Username</label>
    </div>
    <div class="form-floating mb-3">
        <input type="email" class="form-control rounded-0" placeholder="Email" id="email" name="email">
        <label for="email">Email</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control rounded-0" placeholder="Nomor HP" id="no_hp" name="no_hp">
        <label for="no_hp">Nomor HP</label>
    </div>
    <div class="form-floating mb-3">
        <input type="password" class="form-control rounded-0" placeholder="Test" id="password" name="password">
        <label for="password">Password</label>
    </div>
    <div class="d-grid gap-2 mb-3">
        <button type="submit" class="btn btn-primary border-0 rounded-0">Register</button>
    </div>
</form>

<div class="sign-up-accounts text-center">
    <a href="/admin/login" title="Login" class="text-decoration-none">Login</a>
</div>
@endsection
