<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreConfigMammographyMachineRequest;
use App\Http\Requests\UpdateConfigMammographyMachineRequest;
use App\Http\Resources\Admin\ConfigMammographyMachineResource;
use App\Models\ConfigMammographyMachine;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ConfigMammographyMachineApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('config_mammography_machine_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ConfigMammographyMachineResource(ConfigMammographyMachine::all());
    }

    public function store(StoreConfigMammographyMachineRequest $request)
    {
        $configMammographyMachine = ConfigMammographyMachine::create($request->all());

        return (new ConfigMammographyMachineResource($configMammographyMachine))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ConfigMammographyMachine $configMammographyMachine)
    {
        abort_if(Gate::denies('config_mammography_machine_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ConfigMammographyMachineResource($configMammographyMachine);
    }

    public function update(UpdateConfigMammographyMachineRequest $request, ConfigMammographyMachine $configMammographyMachine)
    {
        $configMammographyMachine->update($request->all());

        return (new ConfigMammographyMachineResource($configMammographyMachine))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ConfigMammographyMachine $configMammographyMachine)
    {
        abort_if(Gate::denies('config_mammography_machine_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $configMammographyMachine->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
