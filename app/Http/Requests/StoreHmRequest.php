<?php

namespace App\Http\Requests;

use App\Models\Hm;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreHmRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('hm_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:hms',
            ],
            'username' => [
                'string',
                'required',
                'unique:hms',
            ],
            'password' => [
                'required',
            ],
            'email' => [
                'required',
                'unique:hms',
            ],
            'connection_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'network_ip' => [
                'string',
                'nullable',
            ],
            'pathology_ip' => [
                'string',
                'nullable',
            ],
            'reception_ip' => [
                'string',
                'nullable',
            ],
            'xray_ip' => [
                'string',
                'nullable',
            ],
            'ultrasonography_ip' => [
                'string',
                'nullable',
            ],
            'admin_ip' => [
                'string',
                'nullable',
            ],
            'chairman_name' => [
                'string',
                'nullable',
            ],
            'chairman_number' => [
                'string',
                'nullable',
            ],
            'md_name' => [
                'string',
                'nullable',
            ],
            'md_number' => [
                'string',
                'nullable',
            ],
            'director_name' => [
                'string',
                'nullable',
            ],
            'director_number' => [
                'string',
                'nullable',
            ],
            'manager_name' => [
                'string',
                'nullable',
            ],
            'manager_number' => [
                'string',
                'nullable',
            ],
            'am_name' => [
                'string',
                'nullable',
            ],
            'am_number' => [
                'string',
                'nullable',
            ],
            'ultra_sonogram_assistant_name' => [
                'string',
                'nullable',
            ],
            'ultra_sonogram_assistant_number' => [
                'string',
                'nullable',
            ],
            'medical_technologist_lab_name' => [
                'string',
                'nullable',
            ],
            'medical_technologist_lab_number' => [
                'string',
                'nullable',
            ],
            'medical_technologist_xray_name' => [
                'string',
                'nullable',
            ],
            'medical_technologist_xray_number' => [
                'string',
                'nullable',
            ],
            'accounts_department_name' => [
                'string',
                'nullable',
            ],
            'accounts_department_number' => [
                'string',
                'nullable',
            ],
            'receptionist_name' => [
                'string',
                'nullable',
            ],
            'receptionist_number' => [
                'string',
                'nullable',
            ],
            'accountant_name' => [
                'string',
                'nullable',
            ],
            'accountant_number' => [
                'string',
                'nullable',
            ],
            'bill_send_mail' => [
                'required',
                'unique:hms',
            ],
            'previous_company' => [
                'string',
                'nullable',
            ],
            'it_person_name' => [
                'string',
                'nullable',
            ],
            'it_person_number' => [
                'string',
                'nullable',
            ],
            'installed_by' => [
                'string',
                'nullable',
            ],
            'annual_maintenance_charge' => [
                'string',
                'nullable',
            ],
            'connection_status' => [
                'required',
            ],
            'conncetion_status_reason' => [
                'string',
                'nullable',
            ],
            'connection_type' => [
                'required',
            ],
        ];
    }
}
