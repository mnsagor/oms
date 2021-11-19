<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreRadiologistMentorRequest;
use App\Http\Requests\UpdateRadiologistMentorRequest;
use App\Http\Resources\Admin\RadiologistMentorResource;
use App\Models\RadiologistMentor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RadiologistMentorApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('radiologist_mentor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RadiologistMentorResource(RadiologistMentor::with(['hospital_name'])->get());
    }

    public function store(StoreRadiologistMentorRequest $request)
    {
        $radiologistMentor = RadiologistMentor::create($request->all());

        if ($request->input('documents', false)) {
            $radiologistMentor->addMedia(storage_path('tmp/uploads/' . basename($request->input('documents'))))->toMediaCollection('documents');
        }

        return (new RadiologistMentorResource($radiologistMentor))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(RadiologistMentor $radiologistMentor)
    {
        abort_if(Gate::denies('radiologist_mentor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RadiologistMentorResource($radiologistMentor->load(['hospital_name']));
    }

    public function update(UpdateRadiologistMentorRequest $request, RadiologistMentor $radiologistMentor)
    {
        $radiologistMentor->update($request->all());

        if ($request->input('documents', false)) {
            if (!$radiologistMentor->documents || $request->input('documents') !== $radiologistMentor->documents->file_name) {
                if ($radiologistMentor->documents) {
                    $radiologistMentor->documents->delete();
                }
                $radiologistMentor->addMedia(storage_path('tmp/uploads/' . basename($request->input('documents'))))->toMediaCollection('documents');
            }
        } elseif ($radiologistMentor->documents) {
            $radiologistMentor->documents->delete();
        }

        return (new RadiologistMentorResource($radiologistMentor))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(RadiologistMentor $radiologistMentor)
    {
        abort_if(Gate::denies('radiologist_mentor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $radiologistMentor->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
