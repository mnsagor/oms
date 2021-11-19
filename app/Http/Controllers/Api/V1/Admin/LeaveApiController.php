<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreLeaveRequest;
use App\Http\Requests\UpdateLeaveRequest;
use App\Http\Resources\Admin\LeaveResource;
use App\Models\Leave;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LeaveApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('leave_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LeaveResource(Leave::with(['emp_name'])->get());
    }

    public function store(StoreLeaveRequest $request)
    {
        $leave = Leave::create($request->all());

        return (new LeaveResource($leave))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Leave $leave)
    {
        abort_if(Gate::denies('leave_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LeaveResource($leave->load(['emp_name']));
    }

    public function update(UpdateLeaveRequest $request, Leave $leave)
    {
        $leave->update($request->all());

        return (new LeaveResource($leave))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Leave $leave)
    {
        abort_if(Gate::denies('leave_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $leave->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
