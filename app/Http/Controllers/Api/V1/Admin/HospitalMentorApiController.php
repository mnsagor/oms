<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreHospitalMentorRequest;
use App\Http\Requests\UpdateHospitalMentorRequest;
use App\Http\Resources\Admin\HospitalMentorResource;
use App\Models\HospitalMentor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HospitalMentorApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('hospital_mentor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HospitalMentorResource(HospitalMentor::with(['price_agreement_policy', 'cr_configuration', 'dr_configuration', 'mm_configuration', 'ct_configuration', 'mri_configuration', 'hospital_hr', 'machine_available_profile'])->get());
    }

    public function store(StoreHospitalMentorRequest $request)
    {
        $hospitalMentor = HospitalMentor::create($request->all());

        if ($request->input('agreement_attachment', false)) {
            $hospitalMentor->addMedia(storage_path('tmp/uploads/' . basename($request->input('agreement_attachment'))))->toMediaCollection('agreement_attachment');
        }

        return (new HospitalMentorResource($hospitalMentor))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(HospitalMentor $hospitalMentor)
    {
        abort_if(Gate::denies('hospital_mentor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HospitalMentorResource($hospitalMentor->load(['price_agreement_policy', 'cr_configuration', 'dr_configuration', 'mm_configuration', 'ct_configuration', 'mri_configuration', 'hospital_hr', 'machine_available_profile']));
    }

    public function update(UpdateHospitalMentorRequest $request, HospitalMentor $hospitalMentor)
    {
        $hospitalMentor->update($request->all());

        if ($request->input('agreement_attachment', false)) {
            if (!$hospitalMentor->agreement_attachment || $request->input('agreement_attachment') !== $hospitalMentor->agreement_attachment->file_name) {
                if ($hospitalMentor->agreement_attachment) {
                    $hospitalMentor->agreement_attachment->delete();
                }
                $hospitalMentor->addMedia(storage_path('tmp/uploads/' . basename($request->input('agreement_attachment'))))->toMediaCollection('agreement_attachment');
            }
        } elseif ($hospitalMentor->agreement_attachment) {
            $hospitalMentor->agreement_attachment->delete();
        }

        return (new HospitalMentorResource($hospitalMentor))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(HospitalMentor $hospitalMentor)
    {
        abort_if(Gate::denies('hospital_mentor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hospitalMentor->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
