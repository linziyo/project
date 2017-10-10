<?php

namespace App\Http\Controllers\Api;

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
    public function index()
    {
        return response()->json(Area::paginate(20));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v = \Validator::make($request->all(), []);

        if ($v->fails()) {
            return response()->json($v->errors(), 422);
        }

        $model = new Area();
        $model->fill($request->all());
        $model->save();

        return response()->json(['id' => $model->id, 'created_at' => $model->created_at], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Area::findOrFail($id));
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
        $v = \Validator::make($request->all(), []);

        if ($v->fails()) {
            return response()->json($v->errors(), 422);
        }

        $model = Area::findOrFail($id);
        $model->fill($request->all());
        $model->save();

        return response()->json(['updated_at' => $model->updated_at], 200);
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
        return response()->json();
    }
}
