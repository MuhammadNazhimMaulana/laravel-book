<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Memanggil Interface
use App\Interfaces\Auth\AuthInterface_Admin;

// Memanggil request Buatan Sendiri
use App\Http\Requests\Auth\{StoreRegister, Login};


class Auth_Controller_A extends Controller
{
    public function __construct(AuthInterface_Admin $authInterface_Admin)
    {
        $this->authInterface_Admin = $authInterface_Admin;
    }

    public function login()
    {
       return $this->authInterface_Admin->login();
    }

    public function register()
    {
        return $this->authInterface_Admin->register();
    }

     public function storeRegister(StoreRegister $request)
     {
        return $this->authInterface_Admin->storeRegister($request);
     }

     public function authLogin(Login $request)
     {
        return $this->authInterface_Admin->authLogin($request);
     }

     public function logout(Request $request)
     {
        return $this->authInterface_Admin->logout($request);
     }
}
