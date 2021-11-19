<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyVisitedHospitalRequest;
use App\Http\Requests\StoreVisitedHospitalRequest;
use App\Http\Requests\UpdateVisitedHospitalRequest;
use App\Models\ConfigCrMachine;
use App\Models\ConfigCtMachine;
use App\Models\ConfigDrMachine;
use App\Models\ConfigMammographyMachine;
use App\Models\ConfigMriMachine;
use App\Models\HospitalHr;
use App\Models\VisitedHospital;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class VisitedHospitalController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('visited_hospital_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = VisitedHospital::with(['cr_configuration', 'dr_configuration', 'ct_configuration', 'mri_configuration', 'mm_configuration', 'hospital_hr'])->select(sprintf('%s.*', (new VisitedHospital())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'visited_hospital_show';
                $editGate = 'visited_hospital_edit';
                $deleteGate = 'visited_hospital_delete';
                $crudRoutePart = 'visited-hospitals';

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
            $table->editColumn('status', function ($row) {
                return $row->status ? VisitedHospital::STATUS_SELECT[$row->status] : '';
            });
            $table->editColumn('is_online', function ($row) {
                return $row->is_online ? VisitedHospital::IS_ONLINE_SELECT[$row->is_online] : '';
            });

            $table->editColumn('visited_by', function ($row) {
                return $row->visited_by ? $row->visited_by : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        $config_cr_machines          = ConfigCrMachine::get();
        $config_dr_machines          = ConfigDrMachine::get();
        $config_ct_machines          = ConfigCtMachine::get();
        $config_mri_machines         = ConfigMriMachine::get();
        $config_mammography_machines = ConfigMammographyMachine::get();
        $hospital_hrs                = HospitalHr::get();

        return view('admin.visitedHospitals.index', compact('config_cr_machines', 'config_dr_machines', 'config_ct_machines', 'config_mri_machines', 'config_mammography_machines', 'hospital_hrs'));
    }

    public function create()
    {
        abort_if(Gate::denies('visited_hospital_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cr_configurations = ConfigCrMachine::pluck('hospital_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dr_configurations = ConfigDrMachine::pluck('hospital_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $ct_configurations = ConfigCtMachine::pluck('hospital_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $mri_configurations = ConfigMriMachine::pluck('hospital_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $mm_configurations = ConfigMammographyMachine::pluck('hospital_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $hospital_hrs = HospitalHr::pluck('hopital_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.visitedHospitals.create', compact('cr_configurations', 'dr_configurations', 'ct_configurations', 'mri_configurations', 'mm_configurations', 'hospital_hrs'));
    }

    public function store(StoreVisitedHospitalRequest $request)
    {
        $visitedHospital = VisitedHospital::create($request->all());

        foreach ($request->input('documents', []) as $file) {
            $visitedHospital->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('documents');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $visitedHospital->id]);
        }

        return redirect()->route('admin.visited-hospitals.index');
    }

    public function edit(VisitedHospital $visitedHospital)
    {
        abort_if(Gate::denies('visited_hospital_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cr_configurations = ConfigCrMachine::pluck('hospital_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dr_configurations = ConfigDrMachine::pluck('hospital_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $ct_configurations = ConfigCtMachine::pluck('hospital_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $mri_configurations = ConfigMriMachine::pluck('hospital_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $mm_configurations = ConfigMammographyMachine::pluck('hospital_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $hospital_hrs = HospitalHr::pluck('hopital_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $visitedHospital->load('cr_configuration', 'dr_configuration', 'ct_configuration', 'mri_configuration', 'mm_configuration', 'hospital_hr');

        return view('admin.visitedHospitals.edit', compact('cr_configurations', 'dr_configurations', 'ct_configurations', 'mri_configurations', 'mm_configurations', 'hospital_hrs', 'visitedHospital'));
    }

    public function update(UpdateVisitedHospitalRequest $request, VisitedHospital $visitedHospital)
    {
        $visitedHospital->update($request->all());

        if (count($visitedHospital->documents) > 0) {
            foreach ($visitedHospital->documents as $media) {
                if (!in_array($media->file_name, $request->input('documents', []))) {
                    $media->delete();
                }
            }
        }
        $media = $visitedHospital->documents->pluck('file_name')->toArray();
        foreach ($request->input('documents', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $visitedHospital->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('documents');
            }
        }

        return redirect()->route('admin.visited-hospitals.index');
    }

    public function show(VisitedHospital $visitedHospital)
    {
        abort_if(Gate::denies('visited_hospital_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $visitedHospital->load('cr_configuration', 'dr_configuration', 'ct_configuration', 'mri_configuration', 'mm_configuration', 'hospital_hr');

        return view('admin.visitedHospitals.show', compact('visitedHospital'));
    }

    public function destroy(VisitedHospital $visitedHospital)
    {
        abort_if(Gate::denies('visited_hospital_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $visitedHospital->delete();

        return back();
    }

    public function massDestroy(MassDestroyVisitedHospitalRequest $request)
    {
        VisitedHospital::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('visited_hospital_create') && Gate::denies('visited_hospital_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new VisitedHospital();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
