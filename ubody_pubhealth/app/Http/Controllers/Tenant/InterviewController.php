<?php

namespace App\Http\Controllers\Tenant;

use App\Models\Followup;
use App\Models\Visit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InterviewController extends Controller
{
    public function index()
    {
        return view('tenant.interview.index')->withList(Visit::paginate(20));
    }

    public function create()
    {
        return view('tenant.interview.create');
    }

    public function store(Request $request)
    {

    }
    public static $midwiferyMode=[1 => '顺产', 2 => '胎头吸引', 3 => '产钳', 4 => '剖宫', 5 => '双多胎', 6 => '臀位',7=>'其他'];
    public function edit(Request $request, $id)
    {


        $model = Visit::findOrFail($id);
        $visit_id = $model->id;
        $visit_type = $model->visit_type;
       $newstr= substr(strrchr($visit_type, "\\"), 1);
       echo $newstr;


$aa = $visit_type::findOrFail($visit_id);
        dd($aa);
        return view('tenant.interview.edit')->withModel($model);
    }

    public function update(Request $request, $id)
    {
        $model = Followup::findOrFail($id);
        $model->fill($request->all());
        $model->save();

        return redirect()->action('Tenant\InterviewController@index');
    }

    public function destroy($id)
    {
        $model = Followup::findOrFail($id);
        $model->delete();

        return response()->json();
    }
}
