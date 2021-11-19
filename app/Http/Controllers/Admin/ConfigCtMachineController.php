<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyConfigCtMachineRequest;
use App\Http\Requests\StoreConfigCtMachineRequest;
use App\Http\Requests\UpdateConfigCtMachineRequest;
use App\Models\ConfigCtMachine;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ConfigCtMachineController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('config_ct_machine_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ConfigCtMachine::query()->select(sprintf('%s.*', (new ConfigCtMachine())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'config_ct_machine_show';
                $editGate = 'config_ct_machine_edit';
                $deleteGate = 'config_ct_machine_delete';
                $crudRoutePart = 'config-ct-machines';

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
                return $row->status ? ConfigCtMachine::STATUS_SELECT[$row->status] : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.configCtMachines.index');
    }

    public function create()
    {
        abort_if(Gate::denies('config_ct_machine_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.configCtMachines.create');
    }

    public function store(StoreConfigCtMachineRequest $request)
    {
        $configCtMachine = ConfigCtMachine::create($request->all());

        return redirect()->route('admin.config-ct-machines.index');
    }

    public function edit(ConfigCtMachine $configCtMachine)
    {
        abort_if(Gate::denies('config_ct_machine_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.configCtMachines.edit', compact('configCtMachine'));
    }

    public function update(UpdateConfigCtMachineRequest $request, ConfigCtMachine $configCtMachine)
    {
        $configCtMachine->update($request->all());

        return redirect()->route('admin.config-ct-machines.index');
    }

    public function show(ConfigCtMachine $configCtMachine)
    {
        abort_if(Gate::denies('config_ct_machine_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $configCtMachine->load('ctConfigurationHospitalMediscans', 'ctConfigurationHospitalMentors', 'ctConfigurationHospitalFiveCNetworks', 'ctConfigurationVisitedHospitals');

        return view('admin.configCtMachines.show', compact('configCtMachine'));
    }

    public function destroy(ConfigCtMachine $configCtMachine)
    {
        abort_if(Gate::denies('config_ct_machine_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $configCtMachine->delete();

        return back();
    }

    public function massDestroy(MassDestroyConfigCtMachineRequest $request)
    {
        ConfigCtMachine::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
