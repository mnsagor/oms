<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreHospitalMediscanRequest;
use App\Http\Requests\UpdateHospitalMediscanRequest;
use App\Http\Resources\Admin\HospitalMediscanResource;
use App\Models\HospitalMediscan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HospitalMediscanApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('hospital_mediscan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HospitalMediscanResource(HospitalMediscan::with(['price_agreement_policy', 'cr_configuration', 'dr_configuration', 'mm_configuration', 'ct_configuration', 'mri_configuration', 'hospital_hr', 'machine_available_profile'])->get());
    }

    public function store(StoreHospitalMediscanRequest $request)
    {
        $hospitalMediscan = HospitalMediscan::create($request->all());

        if ($request->input('agreement_attachment', false)) {
            $hospitalMediscan->addMedia(storage_path('tmp/uploads/' . basename($request->input('agreement_attachment'))))->toMediaCollection('agreement_attachment');
        }

        return (new HospitalMediscanResource($hospitalMediscan))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(HospitalMediscan $hospitalMediscan)
    {
        abort_if(Gate::denies('hospital_mediscan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HospitalMediscanResource($hospitalMediscan->load(['price_agreement_policy', 'cr_configuration', 'dr_configuration', 'mm_configuration', 'ct_configuration', 'mri_configuration', 'hospital_hr', 'machine_available_profile']));
    }

    public function update(UpdateHospitalMediscanRequest $request, HospitalMediscan $hospitalMediscan)
    {
        $hospitalMediscan->update($request->all());

        if ($request->input('agreement_attachment', false)) {
            if (!$hospitalMediscan->agreement_attachment || $request->input('agreement_attachment') !== $hospitalMediscan->agreement_attachment->file_name) {
                if ($hospitalMediscan->agreement_attachment) {
                    $hospitalMediscan->agreement_attachment->delete();
                }
                $hospitalMediscan->addMedia(storage_path('tmp/uploads/' . basename($request->input('agreement_attachment'))))->toMediaCollection('agreement_attachment');
            }
        } elseif ($hospitalMediscan->agreement_attachment) {
            $hospitalMediscan->agreement_attachment->delete();
        }

        return (new HospitalMediscanResource($hospitalMediscan))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(HospitalMediscan $hospitalMediscan)
    {
        abort_if(Gate::denies('hospital_mediscan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hospitalMediscan->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
