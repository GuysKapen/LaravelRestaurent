<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function redirects()
    {
        $usertype = '0';
        if (isset(Auth::user()->usertype)) {
            $usertype = Auth::user()->usertype;
        }
        if ('1' == $usertype) {
            return view('admin.admin-home');
        } else {
            return view('home');
        }
    }
}
