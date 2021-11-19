<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreHospitalHrRequest;
use App\Http\Requests\UpdateHospitalHrRequest;
use App\Http\Resources\Admin\HospitalHrResource;
use App\Models\HospitalHr;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HospitalHrApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('hospital_hr_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HospitalHrResource(HospitalHr::all());
    }

    public function store(StoreHospitalHrRequest $request)
    {
        $hospitalHr = HospitalHr::create($request->all());

        return (new HospitalHrResource($hospitalHr))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(HospitalHr $hospitalHr)
    {
        abort_if(Gate::denies('hospital_hr_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HospitalHrResource($hospitalHr);
    }

    public function update(UpdateHospitalHrRequest $request, HospitalHr $hospitalHr)
    {
        $hospitalHr->update($request->all());

        return (new HospitalHrResource($hospitalHr))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(HospitalHr $hospitalHr)
    {
        abort_if(Gate::denies('hospital_hr_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hospitalHr->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
