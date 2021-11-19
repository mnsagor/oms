<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreRadiologistMediscanRequest;
use App\Http\Requests\UpdateRadiologistMediscanRequest;
use App\Http\Resources\Admin\RadiologistMediscanResource;
use App\Models\RadiologistMediscan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RadiologistMediscanApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('radiologist_mediscan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RadiologistMediscanResource(RadiologistMediscan::with(['hospital_name'])->get());
    }

    public function store(StoreRadiologistMediscanRequest $request)
    {
        $radiologistMediscan = RadiologistMediscan::create($request->all());

        if ($request->input('documents', false)) {
            $radiologistMediscan->addMedia(storage_path('tmp/uploads/' . basename($request->input('documents'))))->toMediaCollection('documents');
        }

        return (new RadiologistMediscanResource($radiologistMediscan))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(RadiologistMediscan $radiologistMediscan)
    {
        abort_if(Gate::denies('radiologist_mediscan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RadiologistMediscanResource($radiologistMediscan->load(['hospital_name']));
    }

    public function update(UpdateRadiologistMediscanRequest $request, RadiologistMediscan $radiologistMediscan)
    {
        $radiologistMediscan->update($request->all());

        if ($request->input('documents', false)) {
            if (!$radiologistMediscan->documents || $request->input('documents') !== $radiologistMediscan->documents->file_name) {
                if ($radiologistMediscan->documents) {
                    $radiologistMediscan->documents->delete();
                }
                $radiologistMediscan->addMedia(storage_path('tmp/uploads/' . basename($request->input('documents'))))->toMediaCollection('documents');
            }
        } elseif ($radiologistMediscan->documents) {
            $radiologistMediscan->documents->delete();
        }

        return (new RadiologistMediscanResource($radiologistMediscan))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(RadiologistMediscan $radiologistMediscan)
    {
        abort_if(Gate::denies('radiologist_mediscan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $radiologistMediscan->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
