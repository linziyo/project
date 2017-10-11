<?php

namespace App\Http\Controllers\Admin;

use App\Models\Area;
use App\Models\Community;
use App\Models\CommunityHospital;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Form;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AreaController extends Controller
{


    dd(1);
    public $createValidation = ['name' => 'required|max:200', 'community_id' => 'required|numeric'];
    public $message = ['name.required'=>'区域名称不能为空','name.max'=>'区域名称不能超过200个字','community_id.required'=>'社区ID不能为空','community_id.numeric'=>'社区ID为整数型'];
    public $createColumns = ['name', 'community_id'];
    public function index(Request $request)
    {
        $q =trim($request->get('name'));

        $c= $request->get('community_id');

        if (empty($q) && empty($c)) {
            return view('admin.area.index')
                ->withList(Area::withoutGlobalScope('tenant_id')->where('tenant_id',$request->get('tenant_id'))->paginate(20))
                ->withCommunity(Community::all())
                ->withInput($request->all())
                ->withTenant(Tenant::findOrFail($request->get('tenant_id')));
        } else {
            if(empty($q) || $q == ''){
                $list = Area::withoutGlobalScope('tenant_id')->where('tenant_id',$request->get('tenant_id'))->where('community_id',$c)->paginate(20);
            }elseif(empty($c) || $c == ''){
                $list = Area::withoutGlobalScope('tenant_id')->where('tenant_id',$request->get('tenant_id'))->where('name', 'like', "%$q%")->paginate(20);
            }else{
                $list = Area::withoutGlobalScope('tenant_id')->where('tenant_id',$request->get('tenant_id'))->where('name', 'like', "%$q%")->where('community_id',$c)->paginate(20);
            }
            return view('admin.area.index')
                ->withList($list)
                ->withCommunity(Community::all())
                ->withInput($request->all())
                ->withTenant(Tenant::findOrFail($request->get('tenant_id')));
        }
    }
    
    public function create(Request $request)
    {
        Form::setValidation($this->createValidation);
        $list = ['' => '请选择社区'] + Community::pluck('name', 'id')->all();
        return view('admin.area.create')->withTenant(Tenant::findOrFail($request->get('tenant_id')))->withList($list);
    }

    public function store(Request $request)
    {
        $inputs = Input::only($this->createColumns);
        $rules = $this->createValidation;
        $validator = \Validator::make($inputs, $rules);
        if($validator->fails()){
        }

        $model = new Area();
        $model->fill($request->all());
        $model->save();

        if ($request->ajax()) {
            return response()->json();
        } else {
            return redirect()->action("Admin\\AreaController@index","tenant_id=".$request->get('tenant_id'));
        }
    }

    public function edit($id)
    {
        Form::setValidation($this->createValidation);

        return view('admin.area.edit')->withModel(Area::withoutGlobalScope('tenant_id')->findOrFail($id))->withList(Community::get())->withData(Area::where('id',$id)->first());
    }

    public function update(Request $request, $id)
    {
        $model = Area::withoutGlobalScope('tenant_id')->findOrFail($id);
        $model->fill($request->all());
        $model->save();
        if ($request->ajax()) {
            return response()->json();
        } else {
            return redirect()->action("Admin\\AreaController@index","tenant_id=".$request->get('tenant_id'));
        }
    }
    public function destroy($id)
    {
        $model = Area::withoutGlobalScope('tenant_id')->findOrFail($id);
        $model->delete();
        return response()->json(['success' => true]);
    }
}
