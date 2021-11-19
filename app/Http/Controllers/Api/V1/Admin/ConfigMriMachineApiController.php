<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreConfigMriMachineRequest;
use App\Http\Requests\UpdateConfigMriMachineRequest;
use App\Http\Resources\Admin\ConfigMriMachineResource;
use App\Models\ConfigMriMachine;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ConfigMriMachineApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('config_mri_machine_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ConfigMriMachineResource(ConfigMriMachine::all());
    }

    public function store(StoreConfigMriMachineRequest $request)
    {
        $configMriMachine = ConfigMriMachine::create($request->all());

        return (new ConfigMriMachineResource($configMriMachine))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ConfigMriMachine $configMriMachine)
    {
        abort_if(Gate::denies('config_mri_machine_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ConfigMriMachineResource($configMriMachine);
    }

    public function update(UpdateConfigMriMachineRequest $request, ConfigMriMachine $configMriMachine)
    {
        $configMriMachine->update($request->all());

        return (new ConfigMriMachineResource($configMriMachine))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ConfigMriMachine $configMriMachine)
    {
        abort_if(Gate::denies('config_mri_machine_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $configMriMachine->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
