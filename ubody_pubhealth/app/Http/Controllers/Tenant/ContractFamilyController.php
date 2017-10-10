<?php

namespace App\Http\Controllers\Tenant;

use App\Models\ContractFamily;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContractFamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
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
        return view('tenant.contractfamily.create')->withInput($request->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contract_id = $request->get('contract_id');
        $model = new ContractFamily();
        $model->fill($request->all());
        $model->save();
        if ($request->ajax()) {
            return response()->json();
        } else {
            return redirect()->action("Tenant\\ContractController@show", ['id' => $contract_id]);
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
        return view('tenant.contractfamily.edit')->withModel(ContractFamily::findOrFail($id))->withInput($request->all());
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
        $contract_id = $request->get('contract_id');
        $model = ContractFamily::findOrFail($id);
        $model->fill($request->all());
        $model->save();
        if($request->ajax()){
            return response()->json();
        }else{
            return redirect()->action("Tenant\\ContractController@show", ['id' => $contract_id]);
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
        $model = ContractFamily::findOrFail($id);
        $model->destroy($id);
        return response()->json(['success' => true]);
    }
}