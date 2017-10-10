<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return view('admin.role.index')->withList(Role::paginate(20));
    }

    public function show($id)
    {
        return view('admin.role.show')->withList(Role::findOrFail($id));
    }

    public function create()
    {
        return view('admin.role.create');
    }

    public function store(Request $request)
    {
        $model = new Role();
        $model->fill($request->all());
        $model->save();

        if ($request->ajax()) {
            return response()->json();
        } else {
            return redirect()->action("Admin\\RoleController@index");
        }
    }

    public function edit($id)
    {
        return view('admin.role.edit')->withModel(Role::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $model = Role::findOrFail($id);
        $model->fill($request->all());
        $model->save();

        if ($request->ajax()) {
            return response()->json();
        } else {
            return redirect()->action("Admin\\RoleController@index");
        }
    }

    public function destroy($id)
    {
        $model = Role::findOrFail($id);
        $model->delete();
        return response()->json();
    }
}
