<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyConfigMriMachineRequest;
use App\Http\Requests\StoreConfigMriMachineRequest;
use App\Http\Requests\UpdateConfigMriMachineRequest;
use App\Models\ConfigMriMachine;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ConfigMriMachineController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('config_mri_machine_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ConfigMriMachine::query()->select(sprintf('%s.*', (new ConfigMriMachine())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'config_mri_machine_show';
                $editGate = 'config_mri_machine_edit';
                $deleteGate = 'config_mri_machine_delete';
                $crudRoutePart = 'config-mri-machines';

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
            $table->editColumn('machine_name', function ($row) {
                return $row->machine_name ? $row->machine_name : '';
            });
            $table->editColumn('ae_title', function ($row) {
                return $row->ae_title ? $row->ae_title : '';
            });
            $table->editColumn('port_number', function ($row) {
                return $row->port_number ? $row->port_number : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? ConfigMriMachine::STATUS_SELECT[$row->status] : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.configMriMachines.index');
    }

    public function create()
    {
        abort_if(Gate::denies('config_mri_machine_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.configMriMachines.create');
    }

    public function store(StoreConfigMriMachineRequest $request)
    {
        $configMriMachine = ConfigMriMachine::create($request->all());

        return redirect()->route('admin.config-mri-machines.index');
    }

    public function edit(ConfigMriMachine $configMriMachine)
    {
        abort_if(Gate::denies('config_mri_machine_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.configMriMachines.edit', compact('configMriMachine'));
    }

    public function update(UpdateConfigMriMachineRequest $request, ConfigMriMachine $configMriMachine)
    {
        $configMriMachine->update($request->all());

        return redirect()->route('admin.config-mri-machines.index');
    }

    public function show(ConfigMriMachine $configMriMachine)
    {
        abort_if(Gate::denies('config_mri_machine_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $configMriMachine->load('mriConfigurationHospitalMediscans', 'mriConfigurationHospitalMentors', 'mriConfigurationHospitalFiveCNetworks', 'mriConfigurationVisitedHospitals');

        return view('admin.configMriMachines.show', compact('configMriMachine'));
    }

    public function destroy(ConfigMriMachine $configMriMachine)
    {
        abort_if(Gate::denies('config_mri_machine_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $configMriMachine->delete();

        return back();
    }

    public function massDestroy(MassDestroyConfigMriMachineRequest $request)
    {
        ConfigMriMachine::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
