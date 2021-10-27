<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use Illuminate\Http\Request;

class ChefController extends Controller
{
    public function create(Request $request) {
        if (!isset($request->name) ||
            !isset($request->speciality)
        ) {
            return abort(400, 'Missing field(s)');
        }

        $chef = new Chef();
        if (isset($request->image)) {
            $image = $request->image;
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('chef-images', $imageName);
            $chef->image = $imageName;
        }

        $chef->name = $request->name;
        $chef->speciality = $request->speciality;
        $chef->description = $request->description ?? null;

        $chef->save();
        return redirect()->back();
    }

    public function new() {
        return view('admin.chef-new');
    }
}
