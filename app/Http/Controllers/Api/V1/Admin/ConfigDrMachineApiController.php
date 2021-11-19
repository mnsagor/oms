<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreConfigDrMachineRequest;
use App\Http\Requests\UpdateConfigDrMachineRequest;
use App\Http\Resources\Admin\ConfigDrMachineResource;
use App\Models\ConfigDrMachine;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ConfigDrMachineApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('config_dr_machine_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ConfigDrMachineResource(ConfigDrMachine::all());
    }

    public function store(StoreConfigDrMachineRequest $request)
    {
        $configDrMachine = ConfigDrMachine::create($request->all());

        return (new ConfigDrMachineResource($configDrMachine))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ConfigDrMachine $configDrMachine)
    {
        abort_if(Gate::denies('config_dr_machine_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ConfigDrMachineResource($configDrMachine);
    }

    public function update(UpdateConfigDrMachineRequest $request, ConfigDrMachine $configDrMachine)
    {
        $configDrMachine->update($request->all());

        return (new ConfigDrMachineResource($configDrMachine))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ConfigDrMachine $configDrMachine)
    {
        abort_if(Gate::denies('config_dr_machine_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $configDrMachine->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
