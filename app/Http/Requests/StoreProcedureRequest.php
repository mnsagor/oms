<?php

namespace App\Http\Requests;

use App\Models\Procedure;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProcedureRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('procedure_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:procedures',
            ],
            'status' => [
                'required',
            ],
            'modality_name_id' => [
                'required',
                'integer',
            ],
            'procedure_type_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
