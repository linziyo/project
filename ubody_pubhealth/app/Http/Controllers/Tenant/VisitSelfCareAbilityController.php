<?php

namespace App\Http\Controllers\Tenant;

use App\Models\VisitSelfCareAbility;
use App\Models\Visit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Form;
use App\Http\Requests\SelfCareRequest;
class VisitSelfCareAbilityController extends Controller
{
    public $createValidation = ['meal' => 'required', 'comb_wash' => 'required', 'dressing' => 'required', 'toilets' => 'required', 'activity' => 'required'];
    public $createColumns = ['meal', 'comb_wash', 'dressing', 'toilets', 'activity'];
    public $updateValidation = ['meal' => 'required', 'comb_wash' => 'required', 'dressing' => 'required', 'toilets' => 'required', 'activity' => 'required'];
    public $updateColumns = ['meal', 'comb_wash', 'dressing', 'toilets', 'activity'];


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('tenant.visit_selfcare_ability.index')->withInput($request->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $archive_id = $request->get('archive_id');
        return view('tenant.visit_selfcare_ability.create',compact('archive_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SelfCareRequest $request)
    {
//        $inputs = Input::only($this->createColumns);
//        $rules = $this->createValidation;
//        $validator = \Validator::make($inputs, $rules);
//        if ($validator->fails()) {
//            return Redirect::back()->withErrors($validator);
//        }

        $model = new VisitSelfCareAbility();
        $model->fill($request->all());
        $model->doctor_id = Auth::user()->doctor()->first()->id;
        $model->save();

        if ($request->ajax()) {
            return response()->json();
        } else {
            return redirect()->action('Tenant\ArchiveController@show',$request->get('archive_id'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = VisitSelfCareAbility::where('visit_id',$id)->first()->toArray();
        $archive_id = $data['archive_id'];
        return view('tenant.visit_selfcare_ability.show',compact('data','archive_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = VisitSelfCareAbility::where('visit_id',$id)->first()->toArray();
        $archive_id = $data['archive_id'];
        return view('tenant.visit_selfcare_ability.edit',compact('data','archive_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SelfCareRequest $request, $id)
    {

        $model =VisitSelfCareAbility::where('visit_id',$id)->first();
        $model->fill($request->all());
        $model->save();

        if ($request->ajax()) {
            return response()->json();
        } else {
            return redirect()->action('Tenant\ArchiveController@show',$request->get('archive_id'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = VisitSelfCareAbility::findOrFail($id);
        $model->delete();
        return response()->json();
    }
}
