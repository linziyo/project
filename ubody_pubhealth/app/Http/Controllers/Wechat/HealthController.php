<?php

namespace App\Http\Controllers\Wechat;

use App\Models\Health;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HealthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Health::with(['Member', 'Height', 'Fat'])->user(Auth::user())->get();

        return view('wechat.health.index')->withList($list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Health::with([
            'Member',
            'Height',
            'Fat',
            'MinFat',
            'BloodPressure',
            'BloodOxygen',
            'Ecg',
            'PEEcg',
            'Temperature',
            'Whr',
            'BloodSugar',
            'UricAcid',
            'Chol',
            'BloodFat',
            'Cardiovascular',
            'BMD',
            'Alcohol',
            'Lung',
            'Hb',
            'Urinalysis',
        ])->user(Auth::user())->findOrFail($id);
        return view('wechat.health.show')->withModel($model);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function profile()
    {
        return view('wechat.health.profile');
    }
}
