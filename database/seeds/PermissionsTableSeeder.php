<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 20,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 21,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 22,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 23,
                'title' => 'setting_access',
            ],
            [
                'id'    => 24,
                'title' => 'hospital_management_access',
            ],
            [
                'id'    => 25,
                'title' => 'hospital_mediscan_create',
            ],
            [
                'id'    => 26,
                'title' => 'hospital_mediscan_edit',
            ],
            [
                'id'    => 27,
                'title' => 'hospital_mediscan_show',
            ],
            [
                'id'    => 28,
                'title' => 'hospital_mediscan_delete',
            ],
            [
                'id'    => 29,
                'title' => 'hospital_mediscan_access',
            ],
            [
                'id'    => 30,
                'title' => 'modality_create',
            ],
            [
                'id'    => 31,
                'title' => 'modality_edit',
            ],
            [
                'id'    => 32,
                'title' => 'modality_show',
            ],
            [
                'id'    => 33,
                'title' => 'modality_delete',
            ],
            [
                'id'    => 34,
                'title' => 'modality_access',
            ],
            [
                'id'    => 35,
                'title' => 'procedure_type_create',
            ],
            [
                'id'    => 36,
                'title' => 'procedure_type_edit',
            ],
            [
                'id'    => 37,
                'title' => 'procedure_type_show',
            ],
            [
                'id'    => 38,
                'title' => 'procedure_type_delete',
            ],
            [
                'id'    => 39,
                'title' => 'procedure_type_access',
            ],
            [
                'id'    => 40,
                'title' => 'procedure_create',
            ],
            [
                'id'    => 41,
                'title' => 'procedure_edit',
            ],
            [
                'id'    => 42,
                'title' => 'procedure_show',
            ],
            [
                'id'    => 43,
                'title' => 'procedure_delete',
            ],
            [
                'id'    => 44,
                'title' => 'procedure_access',
            ],
            [
                'id'    => 45,
                'title' => 'hms_client_access',
            ],
            [
                'id'    => 46,
                'title' => 'hm_create',
            ],
            [
                'id'    => 47,
                'title' => 'hm_edit',
            ],
            [
                'id'    => 48,
                'title' => 'hm_show',
            ],
            [
                'id'    => 49,
                'title' => 'hm_delete',
            ],
            [
                'id'    => 50,
                'title' => 'hm_access',
            ],
            [
                'id'    => 51,
                'title' => 'price_agreement_policy_create',
            ],
            [
                'id'    => 52,
                'title' => 'price_agreement_policy_edit',
            ],
            [
                'id'    => 53,
                'title' => 'price_agreement_policy_show',
            ],
            [
                'id'    => 54,
                'title' => 'price_agreement_policy_delete',
            ],
            [
                'id'    => 55,
                'title' => 'price_agreement_policy_access',
            ],
            [
                'id'    => 56,
                'title' => 'machine_configuration_access',
            ],
            [
                'id'    => 57,
                'title' => 'config_cr_machine_create',
            ],
            [
                'id'    => 58,
                'title' => 'config_cr_machine_edit',
            ],
            [
                'id'    => 59,
                'title' => 'config_cr_machine_show',
            ],
            [
                'id'    => 60,
                'title' => 'config_cr_machine_delete',
            ],
            [
                'id'    => 61,
                'title' => 'config_cr_machine_access',
            ],
            [
                'id'    => 62,
                'title' => 'config_dr_machine_create',
            ],
            [
                'id'    => 63,
                'title' => 'config_dr_machine_edit',
            ],
            [
                'id'    => 64,
                'title' => 'config_dr_machine_show',
            ],
            [
                'id'    => 65,
                'title' => 'config_dr_machine_delete',
            ],
            [
                'id'    => 66,
                'title' => 'config_dr_machine_access',
            ],
            [
                'id'    => 67,
                'title' => 'config_mammography_machine_create',
            ],
            [
                'id'    => 68,
                'title' => 'config_mammography_machine_edit',
            ],
            [
                'id'    => 69,
                'title' => 'config_mammography_machine_show',
            ],
            [
                'id'    => 70,
                'title' => 'config_mammography_machine_delete',
            ],
            [
                'id'    => 71,
                'title' => 'config_mammography_machine_access',
            ],
            [
                'id'    => 72,
                'title' => 'config_ct_machine_create',
            ],
            [
                'id'    => 73,
                'title' => 'config_ct_machine_edit',
            ],
            [
                'id'    => 74,
                'title' => 'config_ct_machine_show',
            ],
            [
                'id'    => 75,
                'title' => 'config_ct_machine_delete',
            ],
            [
                'id'    => 76,
                'title' => 'config_ct_machine_access',
            ],
            [
                'id'    => 77,
                'title' => 'config_mri_machine_create',
            ],
            [
                'id'    => 78,
                'title' => 'config_mri_machine_edit',
            ],
            [
                'id'    => 79,
                'title' => 'config_mri_machine_show',
            ],
            [
                'id'    => 80,
                'title' => 'config_mri_machine_delete',
            ],
            [
                'id'    => 81,
                'title' => 'config_mri_machine_access',
            ],
            [
                'id'    => 82,
                'title' => 'hospital_hr_create',
            ],
            [
                'id'    => 83,
                'title' => 'hospital_hr_edit',
            ],
            [
                'id'    => 84,
                'title' => 'hospital_hr_show',
            ],
            [
                'id'    => 85,
                'title' => 'hospital_hr_delete',
            ],
            [
                'id'    => 86,
                'title' => 'hospital_hr_access',
            ],
            [
                'id'    => 87,
                'title' => 'machine_status_profile_create',
            ],
            [
                'id'    => 88,
                'title' => 'machine_status_profile_edit',
            ],
            [
                'id'    => 89,
                'title' => 'machine_status_profile_show',
            ],
            [
                'id'    => 90,
                'title' => 'machine_status_profile_delete',
            ],
            [
                'id'    => 91,
                'title' => 'machine_status_profile_access',
            ],
            [
                'id'    => 92,
                'title' => 'hospital_mentor_create',
            ],
            [
                'id'    => 93,
                'title' => 'hospital_mentor_edit',
            ],
            [
                'id'    => 94,
                'title' => 'hospital_mentor_show',
            ],
            [
                'id'    => 95,
                'title' => 'hospital_mentor_delete',
            ],
            [
                'id'    => 96,
                'title' => 'hospital_mentor_access',
            ],
            [
                'id'    => 97,
                'title' => 'hospital_five_c_network_create',
            ],
            [
                'id'    => 98,
                'title' => 'hospital_five_c_network_edit',
            ],
            [
                'id'    => 99,
                'title' => 'hospital_five_c_network_show',
            ],
            [
                'id'    => 100,
                'title' => 'hospital_five_c_network_delete',
            ],
            [
                'id'    => 101,
                'title' => 'hospital_five_c_network_access',
            ],
            [
                'id'    => 102,
                'title' => 'radiologist_management_access',
            ],
            [
                'id'    => 103,
                'title' => 'radiologist_mediscan_create',
            ],
            [
                'id'    => 104,
                'title' => 'radiologist_mediscan_edit',
            ],
            [
                'id'    => 105,
                'title' => 'radiologist_mediscan_show',
            ],
            [
                'id'    => 106,
                'title' => 'radiologist_mediscan_delete',
            ],
            [
                'id'    => 107,
                'title' => 'radiologist_mediscan_access',
            ],
            [
                'id'    => 108,
                'title' => 'radiologist_mentor_create',
            ],
            [
                'id'    => 109,
                'title' => 'radiologist_mentor_edit',
            ],
            [
                'id'    => 110,
                'title' => 'radiologist_mentor_show',
            ],
            [
                'id'    => 111,
                'title' => 'radiologist_mentor_delete',
            ],
            [
                'id'    => 112,
                'title' => 'radiologist_mentor_access',
            ],
            [
                'id'    => 113,
                'title' => 'radiologist_five_c_create',
            ],
            [
                'id'    => 114,
                'title' => 'radiologist_five_c_edit',
            ],
            [
                'id'    => 115,
                'title' => 'radiologist_five_c_show',
            ],
            [
                'id'    => 116,
                'title' => 'radiologist_five_c_delete',
            ],
            [
                'id'    => 117,
                'title' => 'radiologist_five_c_access',
            ],
            [
                'id'    => 118,
                'title' => 'marketing_department_access',
            ],
            [
                'id'    => 119,
                'title' => 'visited_hospital_create',
            ],
            [
                'id'    => 120,
                'title' => 'visited_hospital_edit',
            ],
            [
                'id'    => 121,
                'title' => 'visited_hospital_show',
            ],
            [
                'id'    => 122,
                'title' => 'visited_hospital_delete',
            ],
            [
                'id'    => 123,
                'title' => 'visited_hospital_access',
            ],
            [
                'id'    => 124,
                'title' => 'upcoming_connection_list_create',
            ],
            [
                'id'    => 125,
                'title' => 'upcoming_connection_list_edit',
            ],
            [
                'id'    => 126,
                'title' => 'upcoming_connection_list_show',
            ],
            [
                'id'    => 127,
                'title' => 'upcoming_connection_list_delete',
            ],
            [
                'id'    => 128,
                'title' => 'upcoming_connection_list_access',
            ],
            [
                'id'    => 129,
                'title' => 'employee_leave_access',
            ],
            [
                'id'    => 130,
                'title' => 'leave_create',
            ],
            [
                'id'    => 131,
                'title' => 'leave_edit',
            ],
            [
                'id'    => 132,
                'title' => 'leave_show',
            ],
            [
                'id'    => 133,
                'title' => 'leave_delete',
            ],
            [
                'id'    => 134,
                'title' => 'leave_access',
            ],
            [
                'id'    => 135,
                'title' => 'leave_history_create',
            ],
            [
                'id'    => 136,
                'title' => 'leave_history_edit',
            ],
            [
                'id'    => 137,
                'title' => 'leave_history_show',
            ],
            [
                'id'    => 138,
                'title' => 'leave_history_delete',
            ],
            [
                'id'    => 139,
                'title' => 'leave_history_access',
            ],
            [
                'id'    => 140,
                'title' => 'task_management_access',
            ],
            [
                'id'    => 141,
                'title' => 'task_status_create',
            ],
            [
                'id'    => 142,
                'title' => 'task_status_edit',
            ],
            [
                'id'    => 143,
                'title' => 'task_status_show',
            ],
            [
                'id'    => 144,
                'title' => 'task_status_delete',
            ],
            [
                'id'    => 145,
                'title' => 'task_status_access',
            ],
            [
                'id'    => 146,
                'title' => 'task_tag_create',
            ],
            [
                'id'    => 147,
                'title' => 'task_tag_edit',
            ],
            [
                'id'    => 148,
                'title' => 'task_tag_show',
            ],
            [
                'id'    => 149,
                'title' => 'task_tag_delete',
            ],
            [
                'id'    => 150,
                'title' => 'task_tag_access',
            ],
            [
                'id'    => 151,
                'title' => 'task_create',
            ],
            [
                'id'    => 152,
                'title' => 'task_edit',
            ],
            [
                'id'    => 153,
                'title' => 'task_show',
            ],
            [
                'id'    => 154,
                'title' => 'task_delete',
            ],
            [
                'id'    => 155,
                'title' => 'task_access',
            ],
            [
                'id'    => 156,
                'title' => 'tasks_calendar_access',
            ],
            [
                'id'    => 157,
                'title' => 'inventory_management_access',
            ],
            [
                'id'    => 158,
                'title' => 'inventory_create',
            ],
            [
                'id'    => 159,
                'title' => 'inventory_edit',
            ],
            [
                'id'    => 160,
                'title' => 'inventory_show',
            ],
            [
                'id'    => 161,
                'title' => 'inventory_delete',
            ],
            [
                'id'    => 162,
                'title' => 'inventory_access',
            ],
            [
                'id'    => 163,
                'title' => 'share_holder_management_access',
            ],
            [
                'id'    => 164,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
