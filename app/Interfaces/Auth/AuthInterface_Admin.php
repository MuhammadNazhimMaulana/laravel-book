<?php

namespace App\Interfaces\Auth;

use App\Http\Requests\Auth\{StoreRegister, Login};
use Illuminate\Http\Request;

interface AuthInterface_Admin
{
    public function login();
    public function register();
    public function storeRegister(StoreRegister $request);
    public function authLogin(Login $request);
    public function logout(Request $request);
}