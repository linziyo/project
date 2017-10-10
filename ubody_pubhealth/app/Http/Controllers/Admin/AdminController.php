<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tenant;
use App\Models\Community;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $q = trim($request->get('name'));
        $c = $request->get('community_id');
        if (empty($q) && empty($c)) {
            return view('admin.admin.index')
                ->withList(Admin::withoutGlobalScope('tenant_id')->paginate(20))
                ->withCommunity(Community::all())
                ->withInput($request->all());
        } else {
            if(empty($q) || $q == ''){
                $list = Admin::withoutGlobalScope('tenant_id')->where('community_id',$c)->paginate(20);
            }elseif(empty($c) || $c == ''){
                $list = Admin::withoutGlobalScope('tenant_id')->where('name', 'like', "%$q%")->paginate(20);
            }else{
                $list = Admin::withoutGlobalScope('tenant_id')-where('name', 'like', "%$q%")->where('community_id',$c)->paginate(20);
            }
            return view('admin.admin.index')
                ->withList($list)
                ->withCommunity(Community::all())
                ->withInput($request->all());
        }
    }

    public function show($id)
    {
        return view('admin.admin.show')->withList(Admin::findOrFail($id));
    }

    public function create()
    {
        $list = ['' => '请选择社区'] + Community::pluck('name', 'id')->all();
        return view('admin.admin.create')->withList($list);
    }

    public function store(Request $request)
    {
        $model = new Admin();
        $model->fill($request->all());
        $model->save();

        if ($request->ajax()) {
            return response()->json();
        } else {
            return redirect()->action("Admin\\AdminController@index");
        }
    }

    public function edit($id)
    {
        $list = ['' => '请选择社区'] + Community::pluck('name', 'id')->all();

        return view('admin.admin.edit')->withModel(Admin::findOrFail($id))
            ->withList($list)
            ;
    }

    public function update(Request $request, $id)
    {
        $model = Admin::findOrFail($id);
        $model->fill($request->all());
        $model->save();

        if ($request->ajax()) {
            return response()->json();
        } else {
            return redirect()->action("Admin\\AdminController@index");
        }
    }

    public function destroy($id)
    {
        $model = Admin::findOrFail($id);
        $model->delete();
        return response()->json();
    }
}
