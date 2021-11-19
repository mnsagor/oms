<?php

namespace App\Http\Requests;

use App\Models\HospitalMentor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateHospitalMentorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('hospital_mentor_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'user_name' => [
                'string',
                'required',
                'unique:hospital_mentors,user_name,' . request()->route('hospital_mentor')->id,
            ],
            'email' => [
                'required',
                'unique:hospital_mentors,email,' . request()->route('hospital_mentor')->id,
            ],
            'connection_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'ct_router_license_status' => [
                'required',
            ],
            'mri_router_license_status' => [
                'required',
            ],
            'dropbox_mail_ip' => [
                'string',
                'nullable',
            ],
            'dropbox_password' => [
                'string',
                'nullable',
            ],
            'profit_sharing_rate' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'installed_by' => [
                'string',
                'nullable',
            ],
            'others_company_name' => [
                'string',
                'nullable',
            ],
            'router_reinstallation_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
