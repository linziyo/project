<?php

namespace App\Http\Controllers\Wechat;

use App\Models\Family;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('wechat.family.index')->withList(Auth::user()->family()->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('wechat.family.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v = \Validator::make($request->all(), [
            'relationship' => 'required',
            'name' => 'required'
        ]);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput($request->all());
        }

        $family = new Family();
        $family->fill($request->all());
        Auth::user()->family()->save($family);
        return redirect()->action('Wechat\FamilyController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Auth::user()->family()->findOrFail($id);
        return view('wechat.family.show')->withModel($model);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Auth::user()->family()->find($id);
        return view('wechat.family.edit')->withModel($model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $v = \Validator::make($request->all(), [
            'relationship' => 'required',
            'name' => 'required'
        ]);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput($request->all());
        }

        $model = Auth::user()->family()->findOrFail($id);
        $model->fill($request->all());
        $model->save();
        return redirect()->action('Wechat\FamilyController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Auth::user()->family()->find($id);
        $model->delete();
        return redirect()->action('Wechat\FamilyController@index');
    }
}
