<?php

namespace App\Http\Controllers\Doctor;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Mockery\CountValidator\Exception;

class HomeController extends Controller
{
    /**医生首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        $doctor = Auth::user()->doctor->first();
        $communityHospital = $doctor->communityHospital;

        //趋势图
        $lastWeek = date('Y-m-d',strtotime('-1 week'));
        $timestamp = strtotime($lastWeek);
        $weekMap = ["周日",'周一','周二','周三','周四','周五','周六'];
        $archiveWeek = $communityHospital->archives()->where('status',1)->where('updated_at','>=',$lastWeek)->get();
        $contractWeek = $doctor->contracts()->where('status',2)->where('updated_at','>=',$lastWeek)->get();
        for($i=0;$i<7;$i++){
            $day = date('w',strtotime("+$i day",$timestamp));
            $archiveWeekMap[$day] = 0;
            $xAxis[] = $weekMap[$day];
        }
        $contractWeekMap =  $archiveWeekMap;

        foreach($archiveWeek as $item){
            $key = date('w',strtotime($item->updated_at));
            $archiveWeekMap[$key]++;
        }
        foreach($contractWeek as $item){
            $key = date('w',strtotime($item->updated_at));
            $contractWeekMap[$key]++;
        }

        $data['xAxis'] = $xAxis;
        $data['archiveWeekMap'] = array_values($archiveWeekMap);
        $data['contractWeekMap'] = array_values($contractWeekMap);
        return view('doctor.home.index',$data);
    }

    public function personal() {

        return view('doctor.home.personal');
    }

    /**个人中心
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function my(){
        return view('doctor.home.my')->withModel(Auth::user()->doctor->first());
    }

    /**个人信息更新
     * @param Request $req
     * @return \Illuminate\Http\JsonResponse
     */
    public function save(Request $req) {
        $userField = ['name','real_name','mobile','id_code','email'];
        $doctorField = ['duty','title','specialty','skills','description'];
        $userFieldValidate = [
            'name' => ['name'=>'required'],
            'real_name' => ['real_name'=>'required'],
            'mobile' => ['mobile'=>'required|mobile'],
            'id_code' => ['id_code'=>'required|id_card_number'],
            'email' => ['email'=>'required|email']
        ];
        $field = $req->get('field');
        $value = $req->get('value');
        $data[$field] = $value;
        if(in_array($field,$userField)){
            $validator = \Validator::make($data,$userFieldValidate[$field]);
            if($validator->fails()){
                $this->throwValidationException($req,$validator);
            }
            if($field == 'id_code'){
                $res = $this->analyseIdCode($value);
                if(!empty($res)){
                    $data['sex'] = $res['sex'];
                    $data['date_of_birth'] = $res['birth'];
                    Auth::user()->fill($data);
                    Auth::user()->save();
                    $sex = $res['sex'] == 1?'男':'女';
                    return response()->json(['success'=>true,'sex'=>$sex,'birth'=>$res['birth']],200);
                }
            }else {
                Auth::user()->fill($data);
                Auth::user()->save();
            }
            return response()->json(['success'=>true],200);
        }elseif(in_array($field,$doctorField)){
            $condition[$field] = 'required';
            $validator = \Validator::make($data,$condition);
            if($validator->fails()){
                $this->throwValidationException($req,$validator);
            }
            $doctor = Auth::user()->doctor()->first();
            $doctor->fill($data);
            $doctor->save();
            return response()->json(['success'=>true],200);
        }

    }

    /**更新密码
     * @param Request $req
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updatepwd(Request $req) {
        $validator = \Validator::make($req->all(),[
            'oldpwd' => 'required',
            'newpwd' => 'required|min:6|same:repwd',
        ]);
        if($validator->fails()){
            $this->throwValidationException($req,$validator);
        }
        $a = $req->get('oldpwd');
        if(\Hash::check($req->get('oldpwd'),Auth::user()->password)){
            Auth::user()->password = bcrypt($req->get('newpwd'));
            if(Auth::user()->save()){
                return response()->json(['success'=>true],200);
            }
        }else {
            return response()->json(['success'=>false],200);
        }

    }

    /**从身份证中获致出生日期和性别
     * @param $id_code
     * @return array
     */
    protected function analyseIdCode($id_code){
        if(strlen($id_code) == 15){
            $sex = substr($id_code,-1)%2 == 1?1:2;
            $year ='19'.substr($id_code,6,2);
            $month = substr($id_code,8,2);
            $day = substr($id_code,10,2);
        }elseif(strlen($id_code) == 18) {
            $sex = substr($id_code,-2,1)%2 == 1?1:2;
            $year =substr($id_code,6,4);
            $month = substr($id_code,10,2);
            $day = substr($id_code,12,2);
        }else {
            return [];
        }
        $birth = "$year-$month-$day";
        return ['birth'=>$birth,'sex'=>$sex];
    }


}
