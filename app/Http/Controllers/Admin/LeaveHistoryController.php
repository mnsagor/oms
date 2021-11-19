<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLeaveHistoryRequest;
use App\Http\Requests\StoreLeaveHistoryRequest;
use App\Http\Requests\UpdateLeaveHistoryRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LeaveHistoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('leave_history_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.leaveHistories.index');
    }

    public function create()
    {
        abort_if(Gate::denies('leave_history_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.leaveHistories.create');
    }

    public function store(StoreLeaveHistoryRequest $request)
    {
        $leaveHistory = LeaveHistory::create($request->all());

        return redirect()->route('admin.leave-histories.index');
    }

    public function edit(LeaveHistory $leaveHistory)
    {
        abort_if(Gate::denies('leave_history_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.leaveHistories.edit', compact('leaveHistory'));
    }

    public function update(UpdateLeaveHistoryRequest $request, LeaveHistory $leaveHistory)
    {
        $leaveHistory->update($request->all());

        return redirect()->route('admin.leave-histories.index');
    }

    public function show(LeaveHistory $leaveHistory)
    {
        abort_if(Gate::denies('leave_history_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.leaveHistories.show', compact('leaveHistory'));
    }

    public function destroy(LeaveHistory $leaveHistory)
    {
        abort_if(Gate::denies('leave_history_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $leaveHistory->delete();

        return back();
    }

    public function massDestroy(MassDestroyLeaveHistoryRequest $request)
    {
        LeaveHistory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
