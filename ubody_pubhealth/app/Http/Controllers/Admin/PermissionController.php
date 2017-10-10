<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    public function index()
    {
        return view('admin.permission.index')->withList(Permission::paginate(20));
    }

    public function show($id)
    {
        return view('admin.permission.show')->withList(Permission::findOrFail($id));
    }

    public function create()
    {
        return view('admin.permission.create');
    }

    public function store(Request $request)
    {
        $model = new Permission();
        $model->fill($request->all());
        $model->save();

        if ($request->ajax()) {
            return response()->json();
        } else {
            return redirect()->action("Admin\\PermissionController@index");
        }
    }

    public function edit($id)
    {
        return view('admin.permission.edit')->withModel(Permission::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $model = Permission::findOrFail($id);
        $model->fill($request->all());
        $model->save();

        if ($request->ajax()) {
            return response()->json();
        } else {
            return redirect()->action("Admin\\PermissionController@index");
        }
    }

    public function destroy($id)
    {
        $model = Permission::findOrFail($id);
        $model->delete();
        return response()->json();
    }
}
