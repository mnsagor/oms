<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyMachineStatusProfileRequest;
use App\Http\Requests\StoreMachineStatusProfileRequest;
use App\Http\Requests\UpdateMachineStatusProfileRequest;
use App\Models\MachineStatusProfile;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class MachineStatusProfileController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('machine_status_profile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = MachineStatusProfile::query()->select(sprintf('%s.*', (new MachineStatusProfile())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'machine_status_profile_show';
                $editGate = 'machine_status_profile_edit';
                $deleteGate = 'machine_status_profile_delete';
                $crudRoutePart = 'machine-status-profiles';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('hospital_name', function ($row) {
                return $row->hospital_name ? $row->hospital_name : '';
            });
            $table->editColumn('ct_center', function ($row) {
                return $row->ct_center ? MachineStatusProfile::CT_CENTER_SELECT[$row->ct_center] : '';
            });
            $table->editColumn('mri_center', function ($row) {
                return $row->mri_center ? MachineStatusProfile::MRI_CENTER_SELECT[$row->mri_center] : '';
            });
            $table->editColumn('mammography_center', function ($row) {
                return $row->mammography_center ? MachineStatusProfile::MAMMOGRAPHY_CENTER_SELECT[$row->mammography_center] : '';
            });
            $table->editColumn('fpd_center', function ($row) {
                return $row->fpd_center ? MachineStatusProfile::FPD_CENTER_SELECT[$row->fpd_center] : '';
            });
            $table->editColumn('dr_center', function ($row) {
                return $row->dr_center ? MachineStatusProfile::DR_CENTER_SELECT[$row->dr_center] : '';
            });
            $table->editColumn('cr_center', function ($row) {
                return $row->cr_center ? MachineStatusProfile::CR_CENTER_SELECT[$row->cr_center] : '';
            });
            $table->editColumn('agfa_center', function ($row) {
                return $row->agfa_center ? MachineStatusProfile::AGFA_CENTER_SELECT[$row->agfa_center] : '';
            });
            $table->editColumn('konica_center', function ($row) {
                return $row->konica_center ? MachineStatusProfile::KONICA_CENTER_SELECT[$row->konica_center] : '';
            });
            $table->editColumn('fier_center', function ($row) {
                return $row->fier_center ? MachineStatusProfile::FIER_CENTER_SELECT[$row->fier_center] : '';
            });
            $table->editColumn('ecg_center', function ($row) {
                return $row->ecg_center ? MachineStatusProfile::ECG_CENTER_SELECT[$row->ecg_center] : '';
            });
            $table->editColumn('simence_center', function ($row) {
                return $row->simence_center ? MachineStatusProfile::SIMENCE_CENTER_SELECT[$row->simence_center] : '';
            });
            $table->editColumn('gee_center', function ($row) {
                return $row->gee_center ? MachineStatusProfile::GEE_CENTER_SELECT[$row->gee_center] : '';
            });
            $table->editColumn('philips_center', function ($row) {
                return $row->philips_center ? MachineStatusProfile::PHILIPS_CENTER_SELECT[$row->philips_center] : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.machineStatusProfiles.index');
    }

    public function create()
    {
        abort_if(Gate::denies('machine_status_profile_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.machineStatusProfiles.create');
    }

    public function store(StoreMachineStatusProfileRequest $request)
    {
        $machineStatusProfile = MachineStatusProfile::create($request->all());

        return redirect()->route('admin.machine-status-profiles.index');
    }

    public function edit(MachineStatusProfile $machineStatusProfile)
    {
        abort_if(Gate::denies('machine_status_profile_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.machineStatusProfiles.edit', compact('machineStatusProfile'));
    }

    public function update(UpdateMachineStatusProfileRequest $request, MachineStatusProfile $machineStatusProfile)
    {
        $machineStatusProfile->update($request->all());

        return redirect()->route('admin.machine-status-profiles.index');
    }

    public function show(MachineStatusProfile $machineStatusProfile)
    {
        abort_if(Gate::denies('machine_status_profile_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $machineStatusProfile->load('machineAvailableProfileHospitalMediscans', 'machineAvailableProfileHospitalMentors', 'machineAvailableProfileHospitalFiveCNetworks');

        return view('admin.machineStatusProfiles.show', compact('machineStatusProfile'));
    }

    public function destroy(MachineStatusProfile $machineStatusProfile)
    {
        abort_if(Gate::denies('machine_status_profile_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $machineStatusProfile->delete();

        return back();
    }

    public function massDestroy(MassDestroyMachineStatusProfileRequest $request)
    {
        MachineStatusProfile::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
