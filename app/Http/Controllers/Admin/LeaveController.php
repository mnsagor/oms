<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyLeaveRequest;
use App\Http\Requests\StoreLeaveRequest;
use App\Http\Requests\UpdateLeaveRequest;
use App\Models\Leave;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class LeaveController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('leave_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Leave::with(['emp_name'])->select(sprintf('%s.*', (new Leave())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'leave_show';
                $editGate = 'leave_edit';
                $deleteGate = 'leave_delete';
                $crudRoutePart = 'leaves';

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
            $table->addColumn('emp_name_full_name', function ($row) {
                return $row->emp_name ? $row->emp_name->full_name : '';
            });

            $table->editColumn('type', function ($row) {
                return $row->type ? Leave::TYPE_SELECT[$row->type] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'emp_name']);

            return $table->make(true);
        }

        $users = User::get();

        return view('admin.leaves.index', compact('users'));
    }

    public function create()
    {
        abort_if(Gate::denies('leave_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $emp_names = User::pluck('full_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.leaves.create', compact('emp_names'));
    }

    public function store(StoreLeaveRequest $request)
    {
        $leave = Leave::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $leave->id]);
        }

        return redirect()->route('admin.leaves.index');
    }

    public function edit(Leave $leave)
    {
        abort_if(Gate::denies('leave_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $emp_names = User::pluck('full_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $leave->load('emp_name');

        return view('admin.leaves.edit', compact('emp_names', 'leave'));
    }

    public function update(UpdateLeaveRequest $request, Leave $leave)
    {
        $leave->update($request->all());

        return redirect()->route('admin.leaves.index');
    }

    public function show(Leave $leave)
    {
        abort_if(Gate::denies('leave_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $leave->load('emp_name');

        return view('admin.leaves.show', compact('leave'));
    }

    public function destroy(Leave $leave)
    {
        abort_if(Gate::denies('leave_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $leave->delete();

        return back();
    }

    public function massDestroy(MassDestroyLeaveRequest $request)
    {
        Leave::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('leave_create') && Gate::denies('leave_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Leave();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
