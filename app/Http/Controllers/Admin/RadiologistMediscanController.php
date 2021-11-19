<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyRadiologistMediscanRequest;
use App\Http\Requests\StoreRadiologistMediscanRequest;
use App\Http\Requests\UpdateRadiologistMediscanRequest;
use App\Models\HospitalMediscan;
use App\Models\RadiologistMediscan;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class RadiologistMediscanController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('radiologist_mediscan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = RadiologistMediscan::with(['hospital_name'])->select(sprintf('%s.*', (new RadiologistMediscan())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'radiologist_mediscan_show';
                $editGate = 'radiologist_mediscan_edit';
                $deleteGate = 'radiologist_mediscan_delete';
                $crudRoutePart = 'radiologist-mediscans';

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
            $table->addColumn('hospital_name_name', function ($row) {
                return $row->hospital_name ? $row->hospital_name->name : '';
            });

            $table->editColumn('status', function ($row) {
                return $row->status ? RadiologistMediscan::STATUS_SELECT[$row->status] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'hospital_name']);

            return $table->make(true);
        }

        $hospital_mediscans = HospitalMediscan::get();

        return view('admin.radiologistMediscans.index', compact('hospital_mediscans'));
    }

    public function create()
    {
        abort_if(Gate::denies('radiologist_mediscan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hospital_names = HospitalMediscan::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.radiologistMediscans.create', compact('hospital_names'));
    }

    public function store(StoreRadiologistMediscanRequest $request)
    {
        $radiologistMediscan = RadiologistMediscan::create($request->all());

        foreach ($request->input('documents', []) as $file) {
            $radiologistMediscan->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('documents');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $radiologistMediscan->id]);
        }

        return redirect()->route('admin.radiologist-mediscans.index');
    }

    public function edit(RadiologistMediscan $radiologistMediscan)
    {
        abort_if(Gate::denies('radiologist_mediscan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hospital_names = HospitalMediscan::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $radiologistMediscan->load('hospital_name');

        return view('admin.radiologistMediscans.edit', compact('hospital_names', 'radiologistMediscan'));
    }

    public function update(UpdateRadiologistMediscanRequest $request, RadiologistMediscan $radiologistMediscan)
    {
        $radiologistMediscan->update($request->all());

        if (count($radiologistMediscan->documents) > 0) {
            foreach ($radiologistMediscan->documents as $media) {
                if (!in_array($media->file_name, $request->input('documents', []))) {
                    $media->delete();
                }
            }
        }
        $media = $radiologistMediscan->documents->pluck('file_name')->toArray();
        foreach ($request->input('documents', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $radiologistMediscan->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('documents');
            }
        }

        return redirect()->route('admin.radiologist-mediscans.index');
    }

    public function show(RadiologistMediscan $radiologistMediscan)
    {
        abort_if(Gate::denies('radiologist_mediscan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $radiologistMediscan->load('hospital_name');

        return view('admin.radiologistMediscans.show', compact('radiologistMediscan'));
    }

    public function destroy(RadiologistMediscan $radiologistMediscan)
    {
        abort_if(Gate::denies('radiologist_mediscan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $radiologistMediscan->delete();

        return back();
    }

    public function massDestroy(MassDestroyRadiologistMediscanRequest $request)
    {
        RadiologistMediscan::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('radiologist_mediscan_create') && Gate::denies('radiologist_mediscan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new RadiologistMediscan();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
