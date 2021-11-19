<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreHospitalFiveCNetworkRequest;
use App\Http\Requests\UpdateHospitalFiveCNetworkRequest;
use App\Http\Resources\Admin\HospitalFiveCNetworkResource;
use App\Models\HospitalFiveCNetwork;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HospitalFiveCNetworkApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('hospital_five_c_network_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HospitalFiveCNetworkResource(HospitalFiveCNetwork::with(['price_agreement_policy', 'cr_configuration', 'dr_configuration', 'mm_configuration', 'ct_configuration', 'mri_configuration', 'hospital_hr', 'machine_available_profile'])->get());
    }

    public function store(StoreHospitalFiveCNetworkRequest $request)
    {
        $hospitalFiveCNetwork = HospitalFiveCNetwork::create($request->all());

        if ($request->input('agreement_attachment', false)) {
            $hospitalFiveCNetwork->addMedia(storage_path('tmp/uploads/' . basename($request->input('agreement_attachment'))))->toMediaCollection('agreement_attachment');
        }

        return (new HospitalFiveCNetworkResource($hospitalFiveCNetwork))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(HospitalFiveCNetwork $hospitalFiveCNetwork)
    {
        abort_if(Gate::denies('hospital_five_c_network_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HospitalFiveCNetworkResource($hospitalFiveCNetwork->load(['price_agreement_policy', 'cr_configuration', 'dr_configuration', 'mm_configuration', 'ct_configuration', 'mri_configuration', 'hospital_hr', 'machine_available_profile']));
    }

    public function update(UpdateHospitalFiveCNetworkRequest $request, HospitalFiveCNetwork $hospitalFiveCNetwork)
    {
        $hospitalFiveCNetwork->update($request->all());

        if ($request->input('agreement_attachment', false)) {
            if (!$hospitalFiveCNetwork->agreement_attachment || $request->input('agreement_attachment') !== $hospitalFiveCNetwork->agreement_attachment->file_name) {
                if ($hospitalFiveCNetwork->agreement_attachment) {
                    $hospitalFiveCNetwork->agreement_attachment->delete();
                }
                $hospitalFiveCNetwork->addMedia(storage_path('tmp/uploads/' . basename($request->input('agreement_attachment'))))->toMediaCollection('agreement_attachment');
            }
        } elseif ($hospitalFiveCNetwork->agreement_attachment) {
            $hospitalFiveCNetwork->agreement_attachment->delete();
        }

        return (new HospitalFiveCNetworkResource($hospitalFiveCNetwork))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(HospitalFiveCNetwork $hospitalFiveCNetwork)
    {
        abort_if(Gate::denies('hospital_five_c_network_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hospitalFiveCNetwork->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
