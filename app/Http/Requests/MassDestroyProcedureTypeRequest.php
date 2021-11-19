<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\ProcedureType;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyProcedureTypeRequest extends FormRequest  {





public function authorize()
{
    abort_if(Gate::denies('procedure_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');




return true;
    
}
public function rules()
{
    



return [
'ids' => 'required|array',
    'ids.*' => 'exists:procedure_types,id',
]
    
}

}