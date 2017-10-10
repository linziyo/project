<?php

namespace App\Http\Controllers\Wechat;

use App\Http\Controllers\Controller;
use App\Models\Archive;
use App\Models\Community;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ArchiveController extends Controller
{
    public function index()
    {

    }

    public function create(Request $request)
    {
        return view('wechat.archive.create')
            ->withUser(Auth::user())
            ->withCommunity(Community::findOrFail($request->get('community_id')));
    }

    public function store(Request $request)
    {
        $v = \Validator::make($request->all(), [
            'community_id' => 'required|exists:communities,id',
            'real_name' => 'required',
            'id_code' => 'required|id_card_number',
            'mobile' => 'required|mobile',
            'address' => 'required',

            'payment_mode' => ['required', Rule::in(['城镇职工基本医疗保险', '城镇居民基本医疗保险', '新型农村合作医疗', '贫困救助', '商业医疗保险', '全公费', '全自费', '其他'])],
            'allergic_history' => ['required'],
            'expose' => ['required'],
            'medical_history' => ['required'],

            'family_history_father' => ['required'],
            'family_history_mother' => ['required'],
            'family_history_children' => ['required'],
            'family_history_sibling' => ['required'],

            'disease_history' => ['required'],
            'disability_history' => ['required'],

            'living_environment_kitchen' => ['required'],
            'living_environment_fuel' => ['required'],
            'living_environment_water' => ['required'],
            'living_environment_toilet' => ['required'],
            'living_environment_fence' => ['required']
        ]);

        if ($v->fails()) {
            return response()->json($v->errors(), 422);
        }

        $archive = new Archive();
        $archive->fill($request->all());
        $archive->user_id = Auth::id();
        $archive->save();
        return response()->json();
    }

    public function show($id)
    {
        $model = Archive::findOrFail($id);
        return view('wechat.archive.show')->withModel($model);
    }

    public function edit($id)
    {
        return view('wechat.archive.edit')->withModel(Archive::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $v = \Validator::make($request->all(), [
            'community_id' => 'required|exists:communities,id',
            'real_name' => 'required',
            'id_code' => 'required|id_card_number',
            'mobile' => 'required|mobile',
            'address' => 'required',

            'payment_mode' => ['required', Rule::in(['城镇职工基本医疗保险', '城镇居民基本医疗保险', '新型农村合作医疗', '贫困救助', '商业医疗保险', '全公费', '全自费', '其他'])],
            'allergic_history' => ['required'],
            'expose' => ['required'],
            'medical_history' => ['required'],

            'family_history_father' => ['required'],
            'family_history_mother' => ['required'],
            'family_history_children' => ['required'],
            'family_history_sibling' => ['required'],

            'disease_history' => ['required'],
            'disability_history' => ['required'],

            'living_environment_kitchen' => ['required'],
            'living_environment_fuel' => ['required'],
            'living_environment_water' => ['required'],
            'living_environment_toilet' => ['required'],
            'living_environment_fence' => ['required']
        ]);

        if ($v->fails()) {
            return response()->json($v->errors(), 422);
        }

        $archive = Archive::findOrFail($id);
        $archive->fill($request->all());
        $archive->user_id = Auth::id();
        $archive->status = 1;
        $archive->save();
        return response()->json();

    }
}
