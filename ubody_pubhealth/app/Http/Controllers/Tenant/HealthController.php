<?php

namespace App\Http\Controllers\Tenant;

use App\Models\Health;
use App\Models\Device;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class HealthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('tenant.health.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tenant.health.create');
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
        $model = Health::findOrFail($id);
        $member = $model->member()->get()->toArray();
        $age = isset($member[0]['Age']) ? $member[0]['Age'] : 0;
        $sex = isset($member[0]['Sex']) ? $member[0]['Sex'] : 0;

        $alcohol = $model->alcohol()->get()->toArray();
        if ($alcohol) {
            $alcohol[0]['health_analysis'] = $model->alcohol->isAbnormal();
        }
        $bloodFat = $model->bloodFat()->get()->toArray();
        if ($bloodFat) {
            $bloodFat[0]['health_analysis'] = $model->bloodFat->isAbnormal();
        }
        $bloodOxygen = $model->bloodOxygen()->get()->toArray();
        if ($bloodOxygen) {
            $bloodOxygen[0]['health_analysis'] = $model->bloodOxygen->isAbnormal();
        }
        $bloodPressure = $model->bloodPressure()->get()->toArray();
        if ($bloodPressure) {
            $bloodPressure[0]['health_analysis'] = $model->bloodPressure->isAbnormal();
        }
        $bloodSugar = $model->bloodSugar()->get()->toArray();
        if ($bloodSugar) {
            $bloodSugar[0]['health_analysis'] = $model->bloodSugar->isAbnormal();
        }
        $bMD = $model->bMD()->get()->toArray();
        if ($bMD) {
            $bMD[0]['health_analysis'] = $model->bMD->isAbnormal();
        }
        $cardiovascular = $model->cardiovascular()->get()->toArray();
        if ($cardiovascular) {
            $cardiovascular[0]['health_analysis'] = false;
        }
        $chol = $model->chol()->get()->toArray();
        if ($chol) {
            $chol[0]['health_analysis'] = $model->chol->isAbnormal();
        }
        $ecg = $model->ecg()->get()->toArray();
        if ($ecg) {
            $ecg[0]['health_analysis'] = $model->ecg->isAbnormal($sex);
        }
        $fat = $model->fat()->get()->toArray();
        if ($fat) {
            $fat[0]['health_analysis'] = false;
        }
        $hb = $model->hb()->get()->toArray();
        if ($hb) {
            $hb[0]['health_analysis'] = $model->hb->isAbnormal($sex);
        }
        $height = $model->height()->get()->toArray();
        if ($height) {
            $height[0]['health_analysis'] = false;
        }
        $lung = $model->lung()->get()->toArray();
        if ($lung) {
            $lung[0]['health_analysis'] = $model->lung->isAbnormal($sex);
        }
        $minFat = $model->minFat()->get()->toArray();
        if ($minFat) {
            $minFat[0]['health_analysis'] = false;
        }
        $pEEcg = $model->pEEcg()->get()->toArray();
        if ($pEEcg) {
            $pEEcg[0]['health_analysis'] = false;
        }
        $temperature = $model->temperature()->get()->toArray();
        if ($temperature) {
            $temperature[0]['health_analysis'] = $model->temperature->isAbnormal();
        }
        $uricAcid = $model->uricAcid()->get()->toArray();
        if ($uricAcid) {
            $uricAcid[0]['health_analysis'] = $model->uricAcid->isAbnormal($sex, $age);
        }
        $urinalysis = $model->urinalysis()->get()->toArray();
        if ($urinalysis) {
            $urinalysis[0]['health_analysis'] = $model->urinalysis->isAbnormal();
        }
        $whr = $model->whr()->get()->toArray();
        if ($whr) {
            $whr[0]['health_analysis'] = $model->whr->isAbnormal($sex);
        }

        $data = ['alcohol' => $alcohol, 'bloodFat' => $bloodFat, 'bloodOxygen' => $bloodOxygen, 'bloodPressure' => $bloodPressure, 'bloodSugar' => $bloodSugar,
            'bMD' => $bMD, 'cardiovascular' => $cardiovascular, 'chol' => $chol, 'ecg' => $ecg, 'fat' => $fat, 'hb' => $hb, 'height' => $height, 'lung' => $lung,
            'minFat' => $minFat, 'pEEcg' => $pEEcg, 'temperature' => $temperature, 'uricAcid' => $uricAcid, 'urinalysis' => $urinalysis, 'whr' => $whr, 'member' => $member];
        return view('tenant.health.show')->withData($data);
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
        $model = Health::findOrFail($id);
        $model->destroy($id);
        return response()->json(['success' => true]);
    }

    public function getHealths($MachineId, $DeviceType)
    {
        $healths = DB::table('healths')->leftJoin('health_member', 'healths.id', '=', 'health_member.health_id')
            ->where('MachineId', $MachineId)
            ->whereNull('healths.deleted_at')
            ->paginate(10);
        $device = Device::where(['code' => $MachineId, 'type' => $DeviceType])->get();
        return view('tenant.health.index')->withHealths($healths)->withDevice($device);
    }


    public function getHealthListData(Request $request, $id_code, $health_type)
    {
        $asynchronous = !empty($request->get('asynchronous')) ? $request->get('asynchronous') : 0;
        $startTime = !empty($request->get('startTime')) ? $request->get('startTime') : 0;
        $endTime = !empty($request->get('endTime')) ? $request->get('endTime').' 23:59:59' : date('Y-m-d').' 23:59:59';

        $types = ['alcohol' => 'health_alcohol', 'bloodFat' => 'health_blood_fat', 'bloodOxygen' => 'health_blood_oxygen', 'bloodPressure' => 'health_blood_pressure',
            'bloodSugar' => 'health_blood_sugar', 'bMD' => 'health_bmd', 'cardiovascular' => 'health_cardiovascular', 'chol' => 'health_chol', 'ecg' => 'health_ecg',
            'fat' => 'health_fat', 'hb' => 'health_hb', 'height' => 'health_height', 'lung' => 'health_lung', 'minFat' => 'health_min_fat', 'pEEcg' => 'health_peecg',
            'temperature' => 'health_temperature', 'uricAcid' => 'health_uric_acid', 'urinalysis' => 'health_urinalysis', 'whr' => 'health_whr'];

        $data = DB::table($types[$health_type])
            ->whereIn('health_id', function ($query) use ($id_code, $startTime, $endTime) {
                $query->select('health_id')->from('health_member')->where('health_member.IdCode', $id_code);
            })->join('healths', "$types[$health_type].health_id", '=', 'healths.id')
            ->whereBetween('healths.MeasureTime', [$startTime, $endTime])->orderBy('healths.MeasureTime', 'desc')->get();

        if ($asynchronous) {
            return response()->json($data);
        }
        return view('tenant.health.archive')->withData($data)->withType($health_type)->withCode($id_code);
    }
}
