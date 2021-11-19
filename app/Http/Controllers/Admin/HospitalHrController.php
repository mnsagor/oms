<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyHospitalHrRequest;
use App\Http\Requests\StoreHospitalHrRequest;
use App\Http\Requests\UpdateHospitalHrRequest;
use App\Models\HospitalHr;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class HospitalHrController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('hospital_hr_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = HospitalHr::query()->select(sprintf('%s.*', (new HospitalHr())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'hospital_hr_show';
                $editGate = 'hospital_hr_edit';
                $deleteGate = 'hospital_hr_delete';
                $crudRoutePart = 'hospital-hrs';

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
            $table->editColumn('hopital_name', function ($row) {
                return $row->hopital_name ? $row->hopital_name : '';
            });
            $table->editColumn('chairman_name', function ($row) {
                return $row->chairman_name ? $row->chairman_name : '';
            });
            $table->editColumn('director_name', function ($row) {
                return $row->director_name ? $row->director_name : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.hospitalHrs.index');
    }

    public function create()
    {
        abort_if(Gate::denies('hospital_hr_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.hospitalHrs.create');
    }

    public function store(StoreHospitalHrRequest $request)
    {
        $hospitalHr = HospitalHr::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $hospitalHr->id]);
        }

        return redirect()->route('admin.hospital-hrs.index');
    }

    public function edit(HospitalHr $hospitalHr)
    {
        abort_if(Gate::denies('hospital_hr_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.hospitalHrs.edit', compact('hospitalHr'));
    }

    public function update(UpdateHospitalHrRequest $request, HospitalHr $hospitalHr)
    {
        $hospitalHr->update($request->all());

        return redirect()->route('admin.hospital-hrs.index');
    }

    public function show(HospitalHr $hospitalHr)
    {
        abort_if(Gate::denies('hospital_hr_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hospitalHr->load('hospitalHrHospitalMediscans', 'hospitalHrHospitalMentors', 'hospitalHrHospitalFiveCNetworks', 'hospitalHrVisitedHospitals');

        return view('admin.hospitalHrs.show', compact('hospitalHr'));
    }

    public function destroy(HospitalHr $hospitalHr)
    {
        abort_if(Gate::denies('hospital_hr_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hospitalHr->delete();

        return back();
    }

    public function massDestroy(MassDestroyHospitalHrRequest $request)
    {
        HospitalHr::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('hospital_hr_create') && Gate::denies('hospital_hr_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new HospitalHr();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
