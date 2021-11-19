<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyConfigCrMachineRequest;
use App\Http\Requests\StoreConfigCrMachineRequest;
use App\Http\Requests\UpdateConfigCrMachineRequest;
use App\Models\ConfigCrMachine;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ConfigCrMachineController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('config_cr_machine_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ConfigCrMachine::query()->select(sprintf('%s.*', (new ConfigCrMachine())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'config_cr_machine_show';
                $editGate = 'config_cr_machine_edit';
                $deleteGate = 'config_cr_machine_delete';
                $crudRoutePart = 'config-cr-machines';

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
                return $row->status ? ConfigCrMachine::STATUS_SELECT[$row->status] : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.configCrMachines.index');
    }

    public function create()
    {
        abort_if(Gate::denies('config_cr_machine_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.configCrMachines.create');
    }

    public function store(StoreConfigCrMachineRequest $request)
    {
        $configCrMachine = ConfigCrMachine::create($request->all());

        return redirect()->route('admin.config-cr-machines.index');
    }

    public function edit(ConfigCrMachine $configCrMachine)
    {
        abort_if(Gate::denies('config_cr_machine_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.configCrMachines.edit', compact('configCrMachine'));
    }

    public function update(UpdateConfigCrMachineRequest $request, ConfigCrMachine $configCrMachine)
    {
        $configCrMachine->update($request->all());

        return redirect()->route('admin.config-cr-machines.index');
    }

    public function show(ConfigCrMachine $configCrMachine)
    {
        abort_if(Gate::denies('config_cr_machine_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $configCrMachine->load('crConfigurationHospitalMediscans', 'crConfigurationHospitalMentors', 'crConfigurationHospitalFiveCNetworks', 'crConfigurationVisitedHospitals');

        return view('admin.configCrMachines.show', compact('configCrMachine'));
    }

    public function destroy(ConfigCrMachine $configCrMachine)
    {
        abort_if(Gate::denies('config_cr_machine_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $configCrMachine->delete();

        return back();
    }

    public function massDestroy(MassDestroyConfigCrMachineRequest $request)
    {
        ConfigCrMachine::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
