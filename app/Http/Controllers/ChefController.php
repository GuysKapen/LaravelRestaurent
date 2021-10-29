<?php /** @noinspection DuplicatedCode */

namespace App\Http\Controllers;

use App\Models\Chef;
use Illuminate\Http\Request;

class ChefController extends Controller
{
    public function create(Request $request)
    {
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

        if ($chef->save()) {
            notify()->success('Save chef successfully!');
        } else {
            notify()->error('Error when saving chef!');
        }
        return redirect()->back();
    }

    public function new()
    {
        return view('admin.chef-new');
    }

    public function chefs()
    {
        $chefs = Chef::all();
        return view('admin.chefs', compact('chefs'));
    }

    public function edit($id)
    {
        $chef = Chef::find($id);
        return view('admin.chef-update', compact('chef'));
    }

    public function update(Request $request, $id)
    {
        if (!isset($request->name) ||
            !isset($request->speciality)
        ) {
            return abort(400, 'Missing field(s)');
        }

        $chef = Chef::find($id);

        if ($chef == null) {
            return abort(400, 'Invalid request...');
        }

        if (isset($request->image)) {
            $image = $request->image;
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('chef-images', $imageName);
            $chef->image = $imageName;
        }

        $chef->name = $request->name;
        $chef->speciality = $request->speciality;
        $chef->description = $request->description ?? null;

        if ($chef->save()) {
            notify()->success('Save chef successfully!');
        } else {
            notify()->error('Error when updating chef!');
        }
        return redirect()->back();
    }

}
