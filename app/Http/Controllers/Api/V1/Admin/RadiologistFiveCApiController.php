<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreRadiologistFiveCRequest;
use App\Http\Requests\UpdateRadiologistFiveCRequest;
use App\Http\Resources\Admin\RadiologistFiveCResource;
use App\Models\RadiologistFiveC;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RadiologistFiveCApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('radiologist_five_c_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RadiologistFiveCResource(RadiologistFiveC::with(['hospital_name'])->get());
    }

    public function store(StoreRadiologistFiveCRequest $request)
    {
        $radiologistFiveC = RadiologistFiveC::create($request->all());

        if ($request->input('documents', false)) {
            $radiologistFiveC->addMedia(storage_path('tmp/uploads/' . basename($request->input('documents'))))->toMediaCollection('documents');
        }

        return (new RadiologistFiveCResource($radiologistFiveC))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(RadiologistFiveC $radiologistFiveC)
    {
        abort_if(Gate::denies('radiologist_five_c_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RadiologistFiveCResource($radiologistFiveC->load(['hospital_name']));
    }

    public function update(UpdateRadiologistFiveCRequest $request, RadiologistFiveC $radiologistFiveC)
    {
        $radiologistFiveC->update($request->all());

        if ($request->input('documents', false)) {
            if (!$radiologistFiveC->documents || $request->input('documents') !== $radiologistFiveC->documents->file_name) {
                if ($radiologistFiveC->documents) {
                    $radiologistFiveC->documents->delete();
                }
                $radiologistFiveC->addMedia(storage_path('tmp/uploads/' . basename($request->input('documents'))))->toMediaCollection('documents');
            }
        } elseif ($radiologistFiveC->documents) {
            $radiologistFiveC->documents->delete();
        }

        return (new RadiologistFiveCResource($radiologistFiveC))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(RadiologistFiveC $radiologistFiveC)
    {
        abort_if(Gate::denies('radiologist_five_c_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $radiologistFiveC->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
