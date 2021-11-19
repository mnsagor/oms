<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyHmRequest;
use App\Http\Requests\StoreHmRequest;
use App\Http\Requests\UpdateHmRequest;
use App\Models\Hm;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class HmsController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('hm_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Hm::query()->select(sprintf('%s.*', (new Hm())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'hm_show';
                $editGate = 'hm_edit';
                $deleteGate = 'hm_delete';
                $crudRoutePart = 'hms';

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
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('username', function ($row) {
                return $row->username ? $row->username : '';
            });
            $table->editColumn('connection_status', function ($row) {
                return $row->connection_status ? Hm::CONNECTION_STATUS_SELECT[$row->connection_status] : '';
            });
            $table->editColumn('connection_type', function ($row) {
                return $row->connection_type ? Hm::CONNECTION_TYPE_SELECT[$row->connection_type] : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.hms.index');
    }

    public function create()
    {
        abort_if(Gate::denies('hm_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.hms.create');
    }

    public function store(StoreHmRequest $request)
    {
        $hm = Hm::create($request->all());

        foreach ($request->input('agreement_attachment', []) as $file) {
            $hm->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('agreement_attachment');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $hm->id]);
        }

        return redirect()->route('admin.hms.index');
    }

    public function edit(Hm $hm)
    {
        abort_if(Gate::denies('hm_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.hms.edit', compact('hm'));
    }

    public function update(UpdateHmRequest $request, Hm $hm)
    {
        $hm->update($request->all());

        if (count($hm->agreement_attachment) > 0) {
            foreach ($hm->agreement_attachment as $media) {
                if (!in_array($media->file_name, $request->input('agreement_attachment', []))) {
                    $media->delete();
                }
            }
        }
        $media = $hm->agreement_attachment->pluck('file_name')->toArray();
        foreach ($request->input('agreement_attachment', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $hm->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('agreement_attachment');
            }
        }

        return redirect()->route('admin.hms.index');
    }

    public function show(Hm $hm)
    {
        abort_if(Gate::denies('hm_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.hms.show', compact('hm'));
    }

    public function destroy(Hm $hm)
    {
        abort_if(Gate::denies('hm_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hm->delete();

        return back();
    }

    public function massDestroy(MassDestroyHmRequest $request)
    {
        Hm::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('hm_create') && Gate::denies('hm_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Hm();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
