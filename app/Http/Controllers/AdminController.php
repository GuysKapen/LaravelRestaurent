<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function users()
    {
        $data = User::all();

        return view('admin.users', compact('data'));
    }

    public function foods()
    {
        $foods = Food::all();
        return view('admin.foods', compact('foods'));
    }
}
