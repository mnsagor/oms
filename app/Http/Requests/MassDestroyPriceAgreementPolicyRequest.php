<?php

namespace App\Http\Requests;

use App\Models\PriceAgreementPolicy;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPriceAgreementPolicyRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('price_agreement_policy_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:price_agreement_policies,id',
        ];
    }
}
