<?php

namespace App\Http\Requests;

use App\Models\Leave;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateLeaveRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('leave_edit');
    }

    public function rules()
    {
        return [
            'emp_name_id' => [
                'required',
                'integer',
            ],
            'type' => [
                'required',
            ],
            'date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'total_day' => [
                'string',
                'required',
            ],
        ];
    }
}
