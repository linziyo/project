<?php
/*
   * 签约
   *author zilin
   * time 201707
   * */
namespace App\Http\Controllers\Admin;

use App\Models\Community;
use App\Models\Contract;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tenant;
use App\Models\Area;
use Auth;
use Form;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http;
use DB;


class ContractController extends Controller
{       /*
    * createValidation验证的字段
    *createColumns 验证需要的字段
    * */
    public $createValidation = ['name' => 'required|max:200', 'address' => 'required|max:200','start_time'=>'required|date','end_time'=>'required|date'];
    public $createColumns = ['name', 'address', 'images', 'contract','start_time','end_time'];
    public function index(Request $request)
    {
        $q = $request->get('q');
        if (empty($q)) {
            return view('admin.contract.index')->withList(Contract::where('tenant_id',$request->get('tenant_id'))->paginate(20))
           ->withTenant(Tenant::findOrFail($request->get('tenant_id')));
        } else {
            return view('admin.contract.index')->withList(Contract::where('name', 'like', "%$q%")->paginate(20))
                ->withInput($request->all());
        }
    }

    public function show($id)
    {
        return view('admin.contract.show')->withModel(Contract::findOrFail($id));
    }
    /*
   * 创建
   *
   * */
    public function create(Request $request)
    {
        Form::setValidation($this->createValidation);
         $list = ['' => '请选择机构'] + Community::pluck('name', 'id')->all();
        return view('admin.contract.create')->withTenant(Tenant::findOrFail($request->get('tenant_id')))->withList($list);
    }
    /*
    * 添加
    *
    * */
    public function store(Request $request)
    {
        $imageUrl = $request->file('image')->store('images');

        $inputs = Input::only($this->createColumns);

        $rules = $this->createValidation;

        $validator = Validator::make($inputs, $rules);
        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }
        $model = new Contract();
        $model->images = $imageUrl;
        $model->doctor_id= Auth::guard('admin')->id();
        $model->package_id= Auth::guard('admin')->id();
        $model->archive_id= Auth::guard('admin')->id();
        $model->fill($request->all());
        $model->save();

        if ($request->ajax()) {
            return response()->json();
        } else {
            return redirect()->action("Admin\\ContractController@index",'tenant_id='.$request->get('tenant_id'));
        }
    }

    public function edit($id)
    {
        Form::setValidation($this->createValidation);
        return view('admin.contract.edit')->withModel(contract::findOrFail($id))->withList(Community::all());
    }

    /*
* 更新
*
* */
    public function update(Request $request, $id)
    {
        /*
* 验证
*
* */
//        dd($request->all());
        $inputs = Input::only($this->createColumns);

        $rules = $this->createValidation;

        $validator = Validator::make($inputs, $rules);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }
        $model = Contract::findOrFail($id);
        $data=$model->fill($request->all());
        $model->save();
        if ($request->ajax()) {
            return response()->json();
        } else {
            return view('admin.contract.index')->withTenant(Tenant::findOrFail($request->get('tenant_id')))->withList(Contract::paginate(20));
        }
    }
    /*
* 删除
*
* */
    public function destroy($id)
    {
        $model = Contract::findOrFail($id);
        $model->delete();
        return response()->json(['success' => true]);
    }
}
