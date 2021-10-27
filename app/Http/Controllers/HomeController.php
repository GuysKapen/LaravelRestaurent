<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $foods = Food::all();
        $chefs = Chef::all();
        return view('home', compact('foods', 'chefs'));
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
