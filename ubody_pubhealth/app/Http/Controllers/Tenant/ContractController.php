<?php

namespace App\Http\Controllers\Tenant;

use App\Models\Archive;
use App\Models\Contract;
use App\Models\Doctor;
use App\Models\Package;
use App\Models\Group;
use App\Models\User;
use Form;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContractController extends Controller
{
    private $createValidator = [
        'archive_id' => 'required|exists:archive,id',
        'package_id' => 'required|exists:packages,id',
        'price' => 'required|digits_between:0,999999'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('tenant.contracts.index')->withList(Contract::orderBy('updated_at','DESC')->paginate(20))->withInput($request->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        Form::setValidation($this->createValidator);
        $archive = Archive::findOrFail($request->get('archive_id'));
        $hospital = Doctor::findByUser(\Auth::user())->communityHospital;
        return view('tenant.contracts.create')->withArchive($archive)->withPackages($hospital->packages);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $doctor = Doctor::findByUser(\Auth::user());

        $model = new Contract();
        $model->fill($request->all());
        $model->doctor()->associate($doctor);
        $model->status = 2;
        $model->save();
//        die;
        $families = [];
        for ($i = 0; $i < sizeof($request->get('relationship')); $i++) {
            $family = array_push($families, [
                'relationship' => $request->get('relationship')[$i],
                'name' => $request->get('real_name')[$i],
                'id_code' => $request->get('id_code')[$i],
                'mobile' => $request->get('mobile')[$i],
            ]);
        }

        $model->family()->createMany($families);

        if ($request->ajax()) {
            return response()->json();
        } else {
            return  back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contract = Contract::findOrFail($id);
        $list = $contract->family()->get();
        return view('tenant.contracts.show')->withModel(Contract::findOrFail($id))->withList($list);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('tenant.contracts.edit')->withModel(Contract::findOrFail($id))
            ->withPackage(Package::all())
            ->withGroup(Group::all())
            ->withUser(User::all());
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
        $model = Contract::findOrFail($id);
        $model->fill($request->all());
        $model->save();
        if ($request->ajax()) {
            return response()->json();
        } else {
            return redirect()->action('Tenant\ContractController@index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Contract::findOrFail($id);
        $model->destroy($id);
        return response()->json(['success' => true]);
    }
}
