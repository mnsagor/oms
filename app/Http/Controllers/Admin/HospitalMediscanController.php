<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyHospitalMediscanRequest;
use App\Http\Requests\StoreHospitalMediscanRequest;
use App\Http\Requests\UpdateHospitalMediscanRequest;
use App\Models\ConfigCrMachine;
use App\Models\ConfigCtMachine;
use App\Models\ConfigDrMachine;
use App\Models\ConfigMammographyMachine;
use App\Models\ConfigMriMachine;
use App\Models\HospitalHr;
use App\Models\HospitalMediscan;
use App\Models\MachineStatusProfile;
use App\Models\PriceAgreementPolicy;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class HospitalMediscanController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('hospital_mediscan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = HospitalMediscan::with(['price_agreement_policy', 'cr_configuration', 'dr_configuration', 'mm_configuration', 'ct_configuration', 'mri_configuration', 'hospital_hr', 'machine_available_profile'])->select(sprintf('%s.*', (new HospitalMediscan())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'hospital_mediscan_show';
                $editGate = 'hospital_mediscan_edit';
                $deleteGate = 'hospital_mediscan_delete';
                $crudRoutePart = 'hospital-mediscans';

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
                return $row->cr_router_license_status ? HospitalMediscan::CR_ROUTER_LICENSE_STATUS_SELECT[$row->cr_router_license_status] : '';
            });
            $table->editColumn('dr_router_license_status', function ($row) {
                return $row->dr_router_license_status ? HospitalMediscan::DR_ROUTER_LICENSE_STATUS_SELECT[$row->dr_router_license_status] : '';
            });
            $table->editColumn('mm_router_license_status', function ($row) {
                return $row->mm_router_license_status ? HospitalMediscan::MM_ROUTER_LICENSE_STATUS_SELECT[$row->mm_router_license_status] : '';
            });
            $table->editColumn('ct_router_license_status', function ($row) {
                return $row->ct_router_license_status ? HospitalMediscan::CT_ROUTER_LICENSE_STATUS_SELECT[$row->ct_router_license_status] : '';
            });
            $table->editColumn('mri_router_license_status', function ($row) {
                return $row->mri_router_license_status ? HospitalMediscan::MRI_ROUTER_LICENSE_STATUS_SELECT[$row->mri_router_license_status] : '';
            });

            $table->editColumn('connection_status', function ($row) {
                return $row->connection_status ? HospitalMediscan::CONNECTION_STATUS_SELECT[$row->connection_status] : '';
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

        return view('admin.hospitalMediscans.index', compact('price_agreement_policies', 'config_cr_machines', 'config_dr_machines', 'config_mammography_machines', 'config_ct_machines', 'config_mri_machines', 'hospital_hrs', 'machine_status_profiles'));
    }

    public function create()
    {
        abort_if(Gate::denies('hospital_mediscan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $price_agreement_policies = PriceAgreementPolicy::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cr_configurations = ConfigCrMachine::all()->pluck('hospital_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dr_configurations = ConfigDrMachine::all()->pluck('hospital_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $mm_configurations = ConfigMammographyMachine::all()->pluck('hospital_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $ct_configurations = ConfigCtMachine::all()->pluck('hospital_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $mri_configurations = ConfigMriMachine::all()->pluck('hospital_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $hospital_hrs = HospitalHr::all()->pluck('hopital_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $machine_available_profiles = MachineStatusProfile::all()->pluck('hospital_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.hospitalMediscans.create', compact('price_agreement_policies', 'cr_configurations', 'dr_configurations', 'mm_configurations', 'ct_configurations', 'mri_configurations', 'hospital_hrs', 'machine_available_profiles'));
    }

    public function store(StoreHospitalMediscanRequest $request)
    {
        $hospitalMediscan = HospitalMediscan::create($request->all());

        foreach ($request->input('agreement_attachment', []) as $file) {
            $hospitalMediscan->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('agreement_attachment');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $hospitalMediscan->id]);
        }

        return redirect()->route('admin.hospital-mediscans.index');
    }

    public function edit(HospitalMediscan $hospitalMediscan)
    {
        abort_if(Gate::denies('hospital_mediscan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $price_agreement_policies = PriceAgreementPolicy::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cr_configurations = ConfigCrMachine::all()->pluck('hospital_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dr_configurations = ConfigDrMachine::all()->pluck('hospital_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $mm_configurations = ConfigMammographyMachine::all()->pluck('hospital_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $ct_configurations = ConfigCtMachine::all()->pluck('hospital_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $mri_configurations = ConfigMriMachine::all()->pluck('hospital_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $hospital_hrs = HospitalHr::all()->pluck('hopital_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $machine_available_profiles = MachineStatusProfile::all()->pluck('hospital_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $hospitalMediscan->load('price_agreement_policy', 'cr_configuration', 'dr_configuration', 'mm_configuration', 'ct_configuration', 'mri_configuration', 'hospital_hr', 'machine_available_profile');

        return view('admin.hospitalMediscans.edit', compact('price_agreement_policies', 'cr_configurations', 'dr_configurations', 'mm_configurations', 'ct_configurations', 'mri_configurations', 'hospital_hrs', 'machine_available_profiles', 'hospitalMediscan'));
    }

    public function update(UpdateHospitalMediscanRequest $request, HospitalMediscan $hospitalMediscan)
    {
        $hospitalMediscan->update($request->all());

        if (count($hospitalMediscan->agreement_attachment) > 0) {
            foreach ($hospitalMediscan->agreement_attachment as $media) {
                if (!in_array($media->file_name, $request->input('agreement_attachment', []))) {
                    $media->delete();
                }
            }
        }
        $media = $hospitalMediscan->agreement_attachment->pluck('file_name')->toArray();
        foreach ($request->input('agreement_attachment', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $hospitalMediscan->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('agreement_attachment');
            }
        }

        return redirect()->route('admin.hospital-mediscans.index');
    }

    public function show(HospitalMediscan $hospitalMediscan)
    {
        abort_if(Gate::denies('hospital_mediscan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hospitalMediscan->load('price_agreement_policy', 'cr_configuration', 'dr_configuration', 'mm_configuration', 'ct_configuration', 'mri_configuration', 'hospital_hr', 'machine_available_profile', 'hospitalNameRadiologistMediscans');

        return view('admin.hospitalMediscans.show', compact('hospitalMediscan'));
    }

    public function destroy(HospitalMediscan $hospitalMediscan)
    {
        abort_if(Gate::denies('hospital_mediscan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hospitalMediscan->delete();

        return back();
    }

    public function massDestroy(MassDestroyHospitalMediscanRequest $request)
    {
        HospitalMediscan::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('hospital_mediscan_create') && Gate::denies('hospital_mediscan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new HospitalMediscan();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
