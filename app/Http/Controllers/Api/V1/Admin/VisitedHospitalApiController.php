<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreVisitedHospitalRequest;
use App\Http\Requests\UpdateVisitedHospitalRequest;
use App\Http\Resources\Admin\VisitedHospitalResource;
use App\Models\VisitedHospital;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VisitedHospitalApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('visited_hospital_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VisitedHospitalResource(VisitedHospital::with(['cr_configuration', 'dr_configuration', 'ct_configuration', 'mri_configuration', 'mm_configuration', 'hospital_hr'])->get());
    }

    public function store(StoreVisitedHospitalRequest $request)
    {
        $visitedHospital = VisitedHospital::create($request->all());

        if ($request->input('documents', false)) {
            $visitedHospital->addMedia(storage_path('tmp/uploads/' . basename($request->input('documents'))))->toMediaCollection('documents');
        }

        return (new VisitedHospitalResource($visitedHospital))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(VisitedHospital $visitedHospital)
    {
        abort_if(Gate::denies('visited_hospital_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VisitedHospitalResource($visitedHospital->load(['cr_configuration', 'dr_configuration', 'ct_configuration', 'mri_configuration', 'mm_configuration', 'hospital_hr']));
    }

    public function update(UpdateVisitedHospitalRequest $request, VisitedHospital $visitedHospital)
    {
        $visitedHospital->update($request->all());

        if ($request->input('documents', false)) {
            if (!$visitedHospital->documents || $request->input('documents') !== $visitedHospital->documents->file_name) {
                if ($visitedHospital->documents) {
                    $visitedHospital->documents->delete();
                }
                $visitedHospital->addMedia(storage_path('tmp/uploads/' . basename($request->input('documents'))))->toMediaCollection('documents');
            }
        } elseif ($visitedHospital->documents) {
            $visitedHospital->documents->delete();
        }

        return (new VisitedHospitalResource($visitedHospital))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(VisitedHospital $visitedHospital)
    {
        abort_if(Gate::denies('visited_hospital_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $visitedHospital->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
