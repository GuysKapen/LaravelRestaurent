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
        $foods = Food::all();
        return view('admin.foods', compact('foods'));
    }

    public function foodCreate(Request $request)
    {
        if (!isset($request->image) ||
            !isset($request->name) ||
            !isset($request->price)) {
            return abort(400, 'Missing field(s)');
        }
        $food = new Food();
        /** @noinspection DuplicatedCode */
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

    public function foodEdit($id)
    {
        $food = Food::find($id);
        return view('admin.food-update', compact('food'));
    }

    public function foodUpdate(Request $request, $id)
    {
        $food = Food::find($id);

        if (!isset($request->name) ||
            !isset($request->price)) {
            return abort(400, 'Missing field(s)');
        }

        if (isset($request->image)
            && $request->image != null) {
            $image = $request->image;
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('food-images', $imageName);
            $food->image = $imageName;
        }
        /** @noinspection DuplicatedCode */
        $food->name = $request->name;
        $food->price = $request->price;
        $food->description = $request->description ?? null;
        $food->save();

        return redirect()->back();
    }
}
