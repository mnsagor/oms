<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreConfigCrMachineRequest;
use App\Http\Requests\UpdateConfigCrMachineRequest;
use App\Http\Resources\Admin\ConfigCrMachineResource;
use App\Models\ConfigCrMachine;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ConfigCrMachineApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('config_cr_machine_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ConfigCrMachineResource(ConfigCrMachine::all());
    }

    public function store(StoreConfigCrMachineRequest $request)
    {
        $configCrMachine = ConfigCrMachine::create($request->all());

        return (new ConfigCrMachineResource($configCrMachine))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ConfigCrMachine $configCrMachine)
    {
        abort_if(Gate::denies('config_cr_machine_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ConfigCrMachineResource($configCrMachine);
    }

    public function update(UpdateConfigCrMachineRequest $request, ConfigCrMachine $configCrMachine)
    {
        $configCrMachine->update($request->all());

        return (new ConfigCrMachineResource($configCrMachine))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ConfigCrMachine $configCrMachine)
    {
        abort_if(Gate::denies('config_cr_machine_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $configCrMachine->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
