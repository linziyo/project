<?php

namespace App\Http\Controllers\Admin;

use App\Models\Archive;
use App\Models\Community;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tenant;
use Auth;
use Form;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use App\Models\Package;
use DB;

class ArchiveController extends Controller
{

    public $createValidation = ['code' => 'required|max:100','address' => 'required|max:100','real_name' => 'required|max:100','sex' => 'required|max:100'
        ,'birthday' => 'required|max:100','work_unit' => 'required|max:100','mobile' => 'required|max:100','description' => 'required|max:100'
    ];
    public $createColumns = ['code', 'address','real_name','sex','birthday','work_unit','mobile','description'];
    public $updateValidation = ['code' => 'required|max:100','real_name' => 'required|max:100',];
    public $updateColumns = ['code','real_name'];

    public function index(Request $request)
    {
        $q = $request->get('real_name');
        if (empty($q)) {
            $list = Archive::where('tenant_id',$request->get('tenant_id'))->paginate(20);
            foreach ($list as $key=>$val ){

                $mobile = User::select('real_name')->where('mobile',$val['mobile'])->get()->toArray();
                if(!empty($mobile)){
                    $list[$key]['real_name'] = $mobile[0]['real_name'];
                }
            }
            return view('admin.archive.index')->withList($list)
                ->withTenant(Tenant::findOrFail($request->get('tenant_id')));
        } else {
            return view('admin.archive.index')
                ->withList(User::where('real_name', 'like', "%$q%")->paginate(20))
                ->withInput($request->all())
                ->withTenant(Tenant::findOrFail($request->get('tenant_id')));
        }
    }

    public function create(Request $request)
    {
        Form::setValidation($this->createValidation);
        $list = ['' => '请选择机构'] + Community::pluck('name', 'id')->all();

        $package = ['' => '请选择服务包'] + Package::withoutGlobalScope('tenant_id')->where('tenant_id',$request->get('tenant_id'))->pluck('name', 'id')->all();
        $abc=Package::where('tenant_id',$request->get('tenant_id'))->pluck('name','id');

        return view('admin.archive.create')
            ->withTenant(Tenant::findOrFail($request->get('tenant_id')))
            ->withList($list)
            ->withPackage($package)
            ;
    }

    public function store(Request $request)
    {
        $inputs = Input::only($this->createColumns);
        $rules = $this->createValidation;
        $validator = Validator::make($inputs, $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        $model = new Archive();
        $model->fill($request->all());
        $model->community_hospital_id= Auth::guard('admin')->id();
        $model->community_id= Auth::guard('admin')->id();
        $model->doctor_id= Auth::guard('admin')->id();
//        $model->is_register='1';

        $model->save();

            if ($request->ajax()) {
                return response()->json();
                return response()->json();
        } else {
                return redirect()->action("Admin\\ArchiveController@index",'tenant_id='.$request->get('tenant_id'));
        }
    }

    public function edit($id)
    {
        Form::setValidation($this->updateValidation);
        return view('admin.archive.edit')->withModel(Archive::findOrFail($id))->withList(Community::all());
    }

    public function update(Request $request, $id)
    {
        $inputs = Input::only($this->updateColumns);
        $rules = $this->updateValidation;
        $validator = Validator::make($inputs, $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        $model = Archive::findOrFail($id);
        $model->fill($request->all());
        $model->save();
        if ($request->ajax()) {
            return response()->json();
        } else {
            return view('admin.archive.index')->withTenant(Tenant::findOrFail($request->get('tenant_id')))->withList(archive::paginate(20));
        }
    }

    public function destroy($id)
    {
        $model = Archive::findOrFail($id);
        $model->delete();
        return response()->json(['success' => true]);
    }
}
