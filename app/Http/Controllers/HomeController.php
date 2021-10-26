<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $data = Food::all();
        return view('home', compact('data'));
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
            $data = Food::all();
            return view('home', compact('data'));
        }
    }
}
