<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUpcomingConnectionListRequest;
use App\Http\Requests\StoreUpcomingConnectionListRequest;
use App\Http\Requests\UpdateUpcomingConnectionListRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UpcomingConnectionListController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('upcoming_connection_list_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.upcomingConnectionLists.index');
    }

    public function create()
    {
        abort_if(Gate::denies('upcoming_connection_list_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.upcomingConnectionLists.create');
    }

    public function store(StoreUpcomingConnectionListRequest $request)
    {
        $upcomingConnectionList = UpcomingConnectionList::create($request->all());

        return redirect()->route('admin.upcoming-connection-lists.index');
    }

    public function edit(UpcomingConnectionList $upcomingConnectionList)
    {
        abort_if(Gate::denies('upcoming_connection_list_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.upcomingConnectionLists.edit', compact('upcomingConnectionList'));
    }

    public function update(UpdateUpcomingConnectionListRequest $request, UpcomingConnectionList $upcomingConnectionList)
    {
        $upcomingConnectionList->update($request->all());

        return redirect()->route('admin.upcoming-connection-lists.index');
    }

    public function show(UpcomingConnectionList $upcomingConnectionList)
    {
        abort_if(Gate::denies('upcoming_connection_list_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.upcomingConnectionLists.show', compact('upcomingConnectionList'));
    }

    public function destroy(UpcomingConnectionList $upcomingConnectionList)
    {
        abort_if(Gate::denies('upcoming_connection_list_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $upcomingConnectionList->delete();

        return back();
    }

    public function massDestroy(MassDestroyUpcomingConnectionListRequest $request)
    {
        UpcomingConnectionList::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
