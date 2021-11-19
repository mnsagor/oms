<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyConfigMammographyMachineRequest;
use App\Http\Requests\StoreConfigMammographyMachineRequest;
use App\Http\Requests\UpdateConfigMammographyMachineRequest;
use App\Models\ConfigMammographyMachine;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ConfigMammographyMachineController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('config_mammography_machine_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ConfigMammographyMachine::query()->select(sprintf('%s.*', (new ConfigMammographyMachine())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'config_mammography_machine_show';
                $editGate = 'config_mammography_machine_edit';
                $deleteGate = 'config_mammography_machine_delete';
                $crudRoutePart = 'config-mammography-machines';

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
                return $row->status ? ConfigMammographyMachine::STATUS_SELECT[$row->status] : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.configMammographyMachines.index');
    }

    public function create()
    {
        abort_if(Gate::denies('config_mammography_machine_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.configMammographyMachines.create');
    }

    public function store(StoreConfigMammographyMachineRequest $request)
    {
        $configMammographyMachine = ConfigMammographyMachine::create($request->all());

        return redirect()->route('admin.config-mammography-machines.index');
    }

    public function edit(ConfigMammographyMachine $configMammographyMachine)
    {
        abort_if(Gate::denies('config_mammography_machine_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.configMammographyMachines.edit', compact('configMammographyMachine'));
    }

    public function update(UpdateConfigMammographyMachineRequest $request, ConfigMammographyMachine $configMammographyMachine)
    {
        $configMammographyMachine->update($request->all());

        return redirect()->route('admin.config-mammography-machines.index');
    }

    public function show(ConfigMammographyMachine $configMammographyMachine)
    {
        abort_if(Gate::denies('config_mammography_machine_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $configMammographyMachine->load('mmConfigurationHospitalMediscans', 'mmConfigurationHospitalMentors', 'mmConfigurationHospitalFiveCNetworks', 'mmConfigurationVisitedHospitals');

        return view('admin.configMammographyMachines.show', compact('configMammographyMachine'));
    }

    public function destroy(ConfigMammographyMachine $configMammographyMachine)
    {
        abort_if(Gate::denies('config_mammography_machine_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $configMammographyMachine->delete();

        return back();
    }

    public function massDestroy(MassDestroyConfigMammographyMachineRequest $request)
    {
        ConfigMammographyMachine::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
