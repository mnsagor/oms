<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyConfigDrMachineRequest;
use App\Http\Requests\StoreConfigDrMachineRequest;
use App\Http\Requests\UpdateConfigDrMachineRequest;
use App\Models\ConfigDrMachine;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ConfigDrMachineController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('config_dr_machine_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ConfigDrMachine::query()->select(sprintf('%s.*', (new ConfigDrMachine())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'config_dr_machine_show';
                $editGate = 'config_dr_machine_edit';
                $deleteGate = 'config_dr_machine_delete';
                $crudRoutePart = 'config-dr-machines';

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
                return $row->status ? ConfigDrMachine::STATUS_SELECT[$row->status] : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.configDrMachines.index');
    }

    public function create()
    {
        abort_if(Gate::denies('config_dr_machine_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.configDrMachines.create');
    }

    public function store(StoreConfigDrMachineRequest $request)
    {
        $configDrMachine = ConfigDrMachine::create($request->all());

        return redirect()->route('admin.config-dr-machines.index');
    }

    public function edit(ConfigDrMachine $configDrMachine)
    {
        abort_if(Gate::denies('config_dr_machine_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.configDrMachines.edit', compact('configDrMachine'));
    }

    public function update(UpdateConfigDrMachineRequest $request, ConfigDrMachine $configDrMachine)
    {
        $configDrMachine->update($request->all());

        return redirect()->route('admin.config-dr-machines.index');
    }

    public function show(ConfigDrMachine $configDrMachine)
    {
        abort_if(Gate::denies('config_dr_machine_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $configDrMachine->load('drConfigurationHospitalMediscans', 'drConfigurationHospitalMentors', 'drConfigurationHospitalFiveCNetworks', 'drConfigurationVisitedHospitals');

        return view('admin.configDrMachines.show', compact('configDrMachine'));
    }

    public function destroy(ConfigDrMachine $configDrMachine)
    {
        abort_if(Gate::denies('config_dr_machine_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $configDrMachine->delete();

        return back();
    }

    public function massDestroy(MassDestroyConfigDrMachineRequest $request)
    {
        ConfigDrMachine::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
