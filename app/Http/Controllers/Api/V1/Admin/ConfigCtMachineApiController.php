<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreConfigCtMachineRequest;
use App\Http\Requests\UpdateConfigCtMachineRequest;
use App\Http\Resources\Admin\ConfigCtMachineResource;
use App\Models\ConfigCtMachine;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ConfigCtMachineApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('config_ct_machine_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ConfigCtMachineResource(ConfigCtMachine::all());
    }

    public function store(StoreConfigCtMachineRequest $request)
    {
        $configCtMachine = ConfigCtMachine::create($request->all());

        return (new ConfigCtMachineResource($configCtMachine))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ConfigCtMachine $configCtMachine)
    {
        abort_if(Gate::denies('config_ct_machine_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ConfigCtMachineResource($configCtMachine);
    }

    public function update(UpdateConfigCtMachineRequest $request, ConfigCtMachine $configCtMachine)
    {
        $configCtMachine->update($request->all());

        return (new ConfigCtMachineResource($configCtMachine))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ConfigCtMachine $configCtMachine)
    {
        abort_if(Gate::denies('config_ct_machine_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $configCtMachine->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
