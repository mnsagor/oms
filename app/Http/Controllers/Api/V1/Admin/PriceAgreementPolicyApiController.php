<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePriceAgreementPolicyRequest;
use App\Http\Requests\UpdatePriceAgreementPolicyRequest;
use App\Http\Resources\Admin\PriceAgreementPolicyResource;
use App\Models\PriceAgreementPolicy;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PriceAgreementPolicyApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('price_agreement_policy_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PriceAgreementPolicyResource(PriceAgreementPolicy::all());
    }

    public function store(StorePriceAgreementPolicyRequest $request)
    {
        $priceAgreementPolicy = PriceAgreementPolicy::create($request->all());

        return (new PriceAgreementPolicyResource($priceAgreementPolicy))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PriceAgreementPolicy $priceAgreementPolicy)
    {
        abort_if(Gate::denies('price_agreement_policy_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PriceAgreementPolicyResource($priceAgreementPolicy);
    }

    public function update(UpdatePriceAgreementPolicyRequest $request, PriceAgreementPolicy $priceAgreementPolicy)
    {
        $priceAgreementPolicy->update($request->all());

        return (new PriceAgreementPolicyResource($priceAgreementPolicy))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PriceAgreementPolicy $priceAgreementPolicy)
    {
        abort_if(Gate::denies('price_agreement_policy_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $priceAgreementPolicy->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
