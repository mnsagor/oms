<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyHospitalMentorRequest;
use App\Http\Requests\StoreHospitalMentorRequest;
use App\Http\Requests\UpdateHospitalMentorRequest;
use App\Models\ConfigCrMachine;
use App\Models\ConfigCtMachine;
use App\Models\ConfigDrMachine;
use App\Models\ConfigMammographyMachine;
use App\Models\ConfigMriMachine;
use App\Models\HospitalHr;
use App\Models\HospitalMentor;
use App\Models\MachineStatusProfile;
use App\Models\PriceAgreementPolicy;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class HospitalMentorController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('hospital_mentor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = HospitalMentor::with(['price_agreement_policy', 'cr_configuration', 'dr_configuration', 'mm_configuration', 'ct_configuration', 'mri_configuration', 'hospital_hr', 'machine_available_profile'])->select(sprintf('%s.*', (new HospitalMentor())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'hospital_mentor_show';
                $editGate = 'hospital_mentor_edit';
                $deleteGate = 'hospital_mentor_delete';
                $crudRoutePart = 'hospital-mentors';

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
            $table->editColumn('user_name', function ($row) {
                return $row->user_name ? $row->user_name : '';
            });

            $table->editColumn('cr_router_license_status', function ($row) {
                return $row->cr_router_license_status ? HospitalMentor::CR_ROUTER_LICENSE_STATUS_SELECT[$row->cr_router_license_status] : '';
            });
            $table->editColumn('dr_router_license_status', function ($row) {
                return $row->dr_router_license_status ? HospitalMentor::DR_ROUTER_LICENSE_STATUS_SELECT[$row->dr_router_license_status] : '';
            });
            $table->editColumn('mm_router_license_status', function ($row) {
                return $row->mm_router_license_status ? HospitalMentor::MM_ROUTER_LICENSE_STATUS_SELECT[$row->mm_router_license_status] : '';
            });
            $table->editColumn('ct_router_license_status', function ($row) {
                return $row->ct_router_license_status ? HospitalMentor::CT_ROUTER_LICENSE_STATUS_SELECT[$row->ct_router_license_status] : '';
            });
            $table->editColumn('mri_router_license_status', function ($row) {
                return $row->mri_router_license_status ? HospitalMentor::MRI_ROUTER_LICENSE_STATUS_SELECT[$row->mri_router_license_status] : '';
            });

            $table->editColumn('connection_status', function ($row) {
                return $row->connection_status ? HospitalMentor::CONNECTION_STATUS_SELECT[$row->connection_status] : '';
            });
            $table->addColumn('machine_available_profile_hospital_name', function ($row) {
                return $row->machine_available_profile ? $row->machine_available_profile->hospital_name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'machine_available_profile']);

            return $table->make(true);
        }

        $price_agreement_policies    = PriceAgreementPolicy::get();
        $config_cr_machines          = ConfigCrMachine::get();
        $config_dr_machines          = ConfigDrMachine::get();
        $config_mammography_machines = ConfigMammographyMachine::get();
        $config_ct_machines          = ConfigCtMachine::get();
        $config_mri_machines         = ConfigMriMachine::get();
        $hospital_hrs                = HospitalHr::get();
        $machine_status_profiles     = MachineStatusProfile::get();

        return view('admin.hospitalMentors.index', compact('price_agreement_policies', 'config_cr_machines', 'config_dr_machines', 'config_mammography_machines', 'config_ct_machines', 'config_mri_machines', 'hospital_hrs', 'machine_status_profiles'));
    }

    public function create()
    {
        abort_if(Gate::denies('hospital_mentor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $price_agreement_policies = PriceAgreementPolicy::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cr_configurations = ConfigCrMachine::pluck('hospital_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dr_configurations = ConfigDrMachine::pluck('hospital_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $mm_configurations = ConfigMammographyMachine::pluck('hospital_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $ct_configurations = ConfigCtMachine::pluck('hospital_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $mri_configurations = ConfigMriMachine::pluck('hospital_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $hospital_hrs = HospitalHr::pluck('hopital_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $machine_available_profiles = MachineStatusProfile::pluck('hospital_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.hospitalMentors.create', compact('price_agreement_policies', 'cr_configurations', 'dr_configurations', 'mm_configurations', 'ct_configurations', 'mri_configurations', 'hospital_hrs', 'machine_available_profiles'));
    }

    public function store(StoreHospitalMentorRequest $request)
    {
        $hospitalMentor = HospitalMentor::create($request->all());

        foreach ($request->input('agreement_attachment', []) as $file) {
            $hospitalMentor->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('agreement_attachment');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $hospitalMentor->id]);
        }

        return redirect()->route('admin.hospital-mentors.index');
    }

    public function edit(HospitalMentor $hospitalMentor)
    {
        abort_if(Gate::denies('hospital_mentor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $price_agreement_policies = PriceAgreementPolicy::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cr_configurations = ConfigCrMachine::pluck('hospital_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dr_configurations = ConfigDrMachine::pluck('hospital_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $mm_configurations = ConfigMammographyMachine::pluck('hospital_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $ct_configurations = ConfigCtMachine::pluck('hospital_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $mri_configurations = ConfigMriMachine::pluck('hospital_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $hospital_hrs = HospitalHr::pluck('hopital_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $machine_available_profiles = MachineStatusProfile::pluck('hospital_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $hospitalMentor->load('price_agreement_policy', 'cr_configuration', 'dr_configuration', 'mm_configuration', 'ct_configuration', 'mri_configuration', 'hospital_hr', 'machine_available_profile');

        return view('admin.hospitalMentors.edit', compact('price_agreement_policies', 'cr_configurations', 'dr_configurations', 'mm_configurations', 'ct_configurations', 'mri_configurations', 'hospital_hrs', 'machine_available_profiles', 'hospitalMentor'));
    }

    public function update(UpdateHospitalMentorRequest $request, HospitalMentor $hospitalMentor)
    {
        $hospitalMentor->update($request->all());

        if (count($hospitalMentor->agreement_attachment) > 0) {
            foreach ($hospitalMentor->agreement_attachment as $media) {
                if (!in_array($media->file_name, $request->input('agreement_attachment', []))) {
                    $media->delete();
                }
            }
        }
        $media = $hospitalMentor->agreement_attachment->pluck('file_name')->toArray();
        foreach ($request->input('agreement_attachment', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $hospitalMentor->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('agreement_attachment');
            }
        }

        return redirect()->route('admin.hospital-mentors.index');
    }

    public function show(HospitalMentor $hospitalMentor)
    {
        abort_if(Gate::denies('hospital_mentor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hospitalMentor->load('price_agreement_policy', 'cr_configuration', 'dr_configuration', 'mm_configuration', 'ct_configuration', 'mri_configuration', 'hospital_hr', 'machine_available_profile', 'hospitalNameRadiologistMentors');

        return view('admin.hospitalMentors.show', compact('hospitalMentor'));
    }

    public function destroy(HospitalMentor $hospitalMentor)
    {
        abort_if(Gate::denies('hospital_mentor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hospitalMentor->delete();

        return back();
    }

    public function massDestroy(MassDestroyHospitalMentorRequest $request)
    {
        HospitalMentor::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('hospital_mentor_create') && Gate::denies('hospital_mentor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new HospitalMentor();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
