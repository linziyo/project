<?php

namespace App\Http\Controllers\Tenant;

use App\Models\Area;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('tenant.areas.index')->withList(Area::paginate(20))->withInput($request->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('tenant.areas.create')->withInput($request->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $community_id = $request->get('community_id');
        $model = new Area();
        $model->fill($request->all());
        $model->save();
        if ($request->ajax()) {
            return response()->json();
        } else {
            return redirect()->action("Tenant\\CommunityController@show", ['id' => $community_id]);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        return view('tenant.areas.edit')->withModel(Area::findOrFail($id))->withInput($request->all());
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
        $community_id = $request->get('community_id');
        $model = Area::findOrFail($id);
        $model->fill($request->all());
        $model->save();

        if($request->ajax()){
            return response()->json();
        }else{
            return redirect()->action("Tenant\\CommunityController@show", ['id' => $community_id]);
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
        $model = Area::findOrFail($id);
        $model->delete();
        return response()->json(['success' => true]);
    }
}
