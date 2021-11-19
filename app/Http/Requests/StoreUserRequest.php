<?php

namespace App\Http\Requests;

use App\Models\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_create');
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
                'unique:users',
            ],
            'password' => [
                'required',
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
                'unique:users',
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
