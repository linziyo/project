<?php

namespace App\Http\Controllers\Wechat;

use App\Models\Contract;
use App\Models\Group;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('wechat.contract.create')->withUser(Auth::user())->withGroup(Group::findOrFail($request->get('group_id')));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v = Validator::make($request->all(), [
            'real_name' => 'required',
            'id_code' => 'required|id_card_number',
            'mobile' => 'required|mobile',
            'address' => 'required'
        ]);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput($request->all());
        }

        $contract = new Contract();
        $contract->fill($request->all());
        $contract->user_id = Auth::user()->id;
        dd($request->get('family'));
        $contract->family()->attach([explode(',', $request->input('family'))]);
        $contract->save();

        return redirect()->action('Wechat\ContractController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
