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

    public function foodNew()
    {
        return view('admin.food-new');
    }

    public function foods()
    {
        $data = Food::all();
        return view('admin.foods', compact('data'));
    }

    public function foodCreate(Request $request)
    {
        if (!isset($request->image) ||
            !isset($request->name) ||
            !isset($request->price)) {
            return abort(400, 'Missing field(s)');
        }
        $food = new Food();
        $image = $request->image;
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('food-images', $imageName);
        $food->image = $imageName;
        $food->name = $request->name;
        $food->price = $request->price;
        $food->description = $request->description ?? null;
        $food->save();

        return redirect()->back();
    }
}
