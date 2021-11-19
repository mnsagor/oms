<?php

namespace App\Http\Requests;

use App\Models\PriceAgreementPolicy;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePriceAgreementPolicyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('price_agreement_policy_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:price_agreement_policies',
            ],
            'xray' => [
                'string',
                'nullable',
            ],
            'xray_single' => [
                'string',
                'nullable',
            ],
            'xray_both' => [
                'string',
                'nullable',
            ],
            'xray_contrast' => [
                'string',
                'nullable',
            ],
            'ct' => [
                'string',
                'nullable',
            ],
            'ct_brain' => [
                'string',
                'nullable',
            ],
            'ct_chest' => [
                'string',
                'nullable',
            ],
            'ct_other' => [
                'string',
                'nullable',
            ],
            'whole_abdomen' => [
                'string',
                'nullable',
            ],
            'urogram' => [
                'string',
                'nullable',
            ],
            'mri' => [
                'string',
                'nullable',
            ],
            'mri_brain' => [
                'string',
                'nullable',
            ],
            'mri_spine' => [
                'string',
                'nullable',
            ],
            'mri_other' => [
                'string',
                'nullable',
            ],
        ];
    }
}
