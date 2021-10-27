<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function new()
    {
        return view('admin.food-new');
    }

    public function create(Request $request)
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
        if ($food->save()) {
            notify()->success('Save food successfully!');
        } else {
            notify()->error('Error when saving food!');
        }
        return redirect()->back();
    }

    public function edit($id)
    {
        $food = Food::find($id);
        return view('admin.food-update', compact('food'));
    }

    public function update(Request $request, $id)
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
        if ($food->save()) {
            notify()->success('Save food successfully!');
        } else {
            notify()->error('Error when updating food!');
        }

        return redirect()->back();
    }

}
