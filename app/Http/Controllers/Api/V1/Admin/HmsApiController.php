<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreHmRequest;
use App\Http\Requests\UpdateHmRequest;
use App\Http\Resources\Admin\HmResource;
use App\Models\Hm;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HmsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('hm_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HmResource(Hm::all());
    }

    public function store(StoreHmRequest $request)
    {
        $hm = Hm::create($request->all());

        if ($request->input('agreement_attachment', false)) {
            $hm->addMedia(storage_path('tmp/uploads/' . basename($request->input('agreement_attachment'))))->toMediaCollection('agreement_attachment');
        }

        return (new HmResource($hm))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Hm $hm)
    {
        abort_if(Gate::denies('hm_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HmResource($hm);
    }

    public function update(UpdateHmRequest $request, Hm $hm)
    {
        $hm->update($request->all());

        if ($request->input('agreement_attachment', false)) {
            if (!$hm->agreement_attachment || $request->input('agreement_attachment') !== $hm->agreement_attachment->file_name) {
                if ($hm->agreement_attachment) {
                    $hm->agreement_attachment->delete();
                }
                $hm->addMedia(storage_path('tmp/uploads/' . basename($request->input('agreement_attachment'))))->toMediaCollection('agreement_attachment');
            }
        } elseif ($hm->agreement_attachment) {
            $hm->agreement_attachment->delete();
        }

        return (new HmResource($hm))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Hm $hm)
    {
        abort_if(Gate::denies('hm_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hm->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
