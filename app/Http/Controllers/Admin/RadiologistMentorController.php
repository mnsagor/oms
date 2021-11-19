<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyRadiologistMentorRequest;
use App\Http\Requests\StoreRadiologistMentorRequest;
use App\Http\Requests\UpdateRadiologistMentorRequest;
use App\Models\HospitalMentor;
use App\Models\RadiologistMentor;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class RadiologistMentorController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('radiologist_mentor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = RadiologistMentor::with(['hospital_name'])->select(sprintf('%s.*', (new RadiologistMentor())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'radiologist_mentor_show';
                $editGate = 'radiologist_mentor_edit';
                $deleteGate = 'radiologist_mentor_delete';
                $crudRoutePart = 'radiologist-mentors';

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
                return $row->status ? RadiologistMentor::STATUS_SELECT[$row->status] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'hospital_name']);

            return $table->make(true);
        }

        $hospital_mentors = HospitalMentor::get();

        return view('admin.radiologistMentors.index', compact('hospital_mentors'));
    }

    public function create()
    {
        abort_if(Gate::denies('radiologist_mentor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hospital_names = HospitalMentor::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.radiologistMentors.create', compact('hospital_names'));
    }

    public function store(StoreRadiologistMentorRequest $request)
    {
        $radiologistMentor = RadiologistMentor::create($request->all());

        foreach ($request->input('documents', []) as $file) {
            $radiologistMentor->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('documents');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $radiologistMentor->id]);
        }

        return redirect()->route('admin.radiologist-mentors.index');
    }

    public function edit(RadiologistMentor $radiologistMentor)
    {
        abort_if(Gate::denies('radiologist_mentor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hospital_names = HospitalMentor::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $radiologistMentor->load('hospital_name');

        return view('admin.radiologistMentors.edit', compact('hospital_names', 'radiologistMentor'));
    }

    public function update(UpdateRadiologistMentorRequest $request, RadiologistMentor $radiologistMentor)
    {
        $radiologistMentor->update($request->all());

        if (count($radiologistMentor->documents) > 0) {
            foreach ($radiologistMentor->documents as $media) {
                if (!in_array($media->file_name, $request->input('documents', []))) {
                    $media->delete();
                }
            }
        }
        $media = $radiologistMentor->documents->pluck('file_name')->toArray();
        foreach ($request->input('documents', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $radiologistMentor->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('documents');
            }
        }

        return redirect()->route('admin.radiologist-mentors.index');
    }

    public function show(RadiologistMentor $radiologistMentor)
    {
        abort_if(Gate::denies('radiologist_mentor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $radiologistMentor->load('hospital_name');

        return view('admin.radiologistMentors.show', compact('radiologistMentor'));
    }

    public function destroy(RadiologistMentor $radiologistMentor)
    {
        abort_if(Gate::denies('radiologist_mentor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $radiologistMentor->delete();

        return back();
    }

    public function massDestroy(MassDestroyRadiologistMentorRequest $request)
    {
        RadiologistMentor::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('radiologist_mentor_create') && Gate::denies('radiologist_mentor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new RadiologistMentor();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
