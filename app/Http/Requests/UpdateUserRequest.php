<?php

namespace App\Http\Requests;

use App\Models\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_edit');
    }

    public function rules()
    {
        return [
            'full_name' => [
                'string',
                'required',
            ],
            'name' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
                'unique:users,email,' . request()->route('user')->id,
            ],
            'roles.*' => [
                'integer',
            ],
            'roles' => [
                'required',
                'array',
            ],
            'father_name' => [
                'string',
                'required',
            ],
            'mother_name' => [
                'string',
                'required',
            ],
            'designation' => [
                'string',
                'required',
            ],
            'mobile' => [
                'string',
                'required',
                'unique:users,mobile,' . request()->route('user')->id,
            ],
            'dob' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'salary_type' => [
                'required',
            ],
            'gender' => [
                'required',
            ],
            'joining_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'salary' => [
                'string',
                'required',
            ],
        ];
    }
}
