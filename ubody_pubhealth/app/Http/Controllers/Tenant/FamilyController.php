<?php

namespace App\Http\Controllers\Tenant;

use App\Models\Family;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->get('q');
        if(empty($q)){
            return view('tenant.family.index')->withList(Family::paginate(20))->withInput($request->all());
        }else{
            return view('tenant.family.index')->withList(Family::where('name', 'like', "%$q%")->paginate(20))
                                                     ->withInput($request->all());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tenant.family.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = $request->get('user_id');
        $model = new Family();
        $model->fill($request->all());
        $model->save();
        if($request->ajax()){
           return response()->json();
        }else{
           return redirect()->action('Tenant\UserController@show',['id'=>$user_id]);
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
        return view('tenant.family.show')->withModel(Family::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('tenant.family.edit')->withModel(Family::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user_id = $request->get('user_id');
        $model = Family::findOrFail($id);
        $model->fill($request->all());
        $model->save();
        if ($request->ajax()) {
            return response()->json();
        } else {
            return redirect()->action('Tenant\UserController@show',['id'=>$user_id]);
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
        $model = Family::findOrFail($id);
        $model->destroy($id);
        return response()->json(['success' => true]);
    }
}
