<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMachineStatusProfileRequest;
use App\Http\Requests\UpdateMachineStatusProfileRequest;
use App\Http\Resources\Admin\MachineStatusProfileResource;
use App\Models\MachineStatusProfile;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MachineStatusProfileApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('machine_status_profile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MachineStatusProfileResource(MachineStatusProfile::all());
    }

    public function store(StoreMachineStatusProfileRequest $request)
    {
        $machineStatusProfile = MachineStatusProfile::create($request->all());

        return (new MachineStatusProfileResource($machineStatusProfile))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(MachineStatusProfile $machineStatusProfile)
    {
        abort_if(Gate::denies('machine_status_profile_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MachineStatusProfileResource($machineStatusProfile);
    }

    public function update(UpdateMachineStatusProfileRequest $request, MachineStatusProfile $machineStatusProfile)
    {
        $machineStatusProfile->update($request->all());

        return (new MachineStatusProfileResource($machineStatusProfile))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(MachineStatusProfile $machineStatusProfile)
    {
        abort_if(Gate::denies('machine_status_profile_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $machineStatusProfile->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
