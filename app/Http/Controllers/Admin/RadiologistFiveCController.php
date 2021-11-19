<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyRadiologistFiveCRequest;
use App\Http\Requests\StoreRadiologistFiveCRequest;
use App\Http\Requests\UpdateRadiologistFiveCRequest;
use App\Models\HospitalFiveCNetwork;
use App\Models\RadiologistFiveC;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class RadiologistFiveCController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('radiologist_five_c_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = RadiologistFiveC::with(['hospital_name'])->select(sprintf('%s.*', (new RadiologistFiveC())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'radiologist_five_c_show';
                $editGate = 'radiologist_five_c_edit';
                $deleteGate = 'radiologist_five_c_delete';
                $crudRoutePart = 'radiologist-five-cs';

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
                return $row->status ? RadiologistFiveC::STATUS_SELECT[$row->status] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'hospital_name']);

            return $table->make(true);
        }

        $hospital_five_c_networks = HospitalFiveCNetwork::get();

        return view('admin.radiologistFiveCs.index', compact('hospital_five_c_networks'));
    }

    public function create()
    {
        abort_if(Gate::denies('radiologist_five_c_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hospital_names = HospitalFiveCNetwork::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.radiologistFiveCs.create', compact('hospital_names'));
    }

    public function store(StoreRadiologistFiveCRequest $request)
    {
        $radiologistFiveC = RadiologistFiveC::create($request->all());

        foreach ($request->input('documents', []) as $file) {
            $radiologistFiveC->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('documents');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $radiologistFiveC->id]);
        }

        return redirect()->route('admin.radiologist-five-cs.index');
    }

    public function edit(RadiologistFiveC $radiologistFiveC)
    {
        abort_if(Gate::denies('radiologist_five_c_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hospital_names = HospitalFiveCNetwork::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $radiologistFiveC->load('hospital_name');

        return view('admin.radiologistFiveCs.edit', compact('hospital_names', 'radiologistFiveC'));
    }

    public function update(UpdateRadiologistFiveCRequest $request, RadiologistFiveC $radiologistFiveC)
    {
        $radiologistFiveC->update($request->all());

        if (count($radiologistFiveC->documents) > 0) {
            foreach ($radiologistFiveC->documents as $media) {
                if (!in_array($media->file_name, $request->input('documents', []))) {
                    $media->delete();
                }
            }
        }
        $media = $radiologistFiveC->documents->pluck('file_name')->toArray();
        foreach ($request->input('documents', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $radiologistFiveC->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('documents');
            }
        }

        return redirect()->route('admin.radiologist-five-cs.index');
    }

    public function show(RadiologistFiveC $radiologistFiveC)
    {
        abort_if(Gate::denies('radiologist_five_c_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $radiologistFiveC->load('hospital_name');

        return view('admin.radiologistFiveCs.show', compact('radiologistFiveC'));
    }

    public function destroy(RadiologistFiveC $radiologistFiveC)
    {
        abort_if(Gate::denies('radiologist_five_c_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $radiologistFiveC->delete();

        return back();
    }

    public function massDestroy(MassDestroyRadiologistFiveCRequest $request)
    {
        RadiologistFiveC::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('radiologist_five_c_create') && Gate::denies('radiologist_five_c_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new RadiologistFiveC();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
