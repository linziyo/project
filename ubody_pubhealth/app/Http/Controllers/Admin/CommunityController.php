<?php
/*
社区管理
*/
namespace App\Http\Controllers\Admin;

use App\Models\Community;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class CommunityController extends Controller
{

    public function index(Request $request)

    {
        $list = Community::paginate(20);
        if ($request->ajax()) {
            return response()->json($list);
        } else {
            return view('admin.community.index')->withList($list);
        }
    }

    public function show($id)
    {
        return view('admin.community.show')->withList(Community::findOrFail($id));
    }

    public function create()
    {
        return view('admin.community.create');
    }

    public function store(Request $request)
    {
        $model = new Community();
        $model->fill($request->all());
        $model->tenant_id = Auth::guard('admin')->id();
        $model->save();
        if ($request->ajax()) {
            return response()->json($model);
        } else {
            return redirect()->action("Admin\\CommunityController@index");
        }
    }

    public function edit($id)
    {
        return view('admin.community.edit')->withModel(Community::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $model = Community::findOrFail($id);
        $model->fill($request->all());
        $model->save();
        if ($request->ajax()) {
            return response()->json();
        } else {
            return redirect()->action("Admin\\CommunityController@index");
        }
    }

    public function destroy($id)
    {
        $model = Community::findOrFail($id);
        $model->delete();
        return response()->json();
        return redirect()->action("Admin\\ArchiveController@index");

        }
}
