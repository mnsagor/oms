<?php

namespace App\Http\Requests;

use App\Models\ProcedureType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProcedureTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('procedure_type_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:procedure_types,name,' . request()->route('procedure_type')->id,
            ],
            'status' => [
                'required',
            ],
        ];
    }
}
