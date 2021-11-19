<?php

namespace App\Http\Requests;

use App\Models\HospitalFiveCNetwork;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyHospitalFiveCNetworkRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('hospital_five_c_network_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:hospital_five_c_networks,id',
        ];
    }
}
