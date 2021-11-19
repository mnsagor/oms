<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MachineStatusProfile extends Model
{
    use SoftDeletes;
    use Auditable;

    public const DR_CENTER_SELECT = [
        'yes' => 'Yes',
        'no'  => 'No',
    ];

    public const CR_CENTER_SELECT = [
        'yes' => 'Yes',
        'no'  => 'No',
    ];

    public const CT_CENTER_SELECT = [
        'yes' => 'Yes',
        'no'  => 'No',
    ];

    public const MRI_CENTER_SELECT = [
        'yes' => 'Yes',
        'no'  => 'No',
    ];

    public const FPD_CENTER_SELECT = [
        'yes' => 'Yes',
        'no'  => 'No',
    ];

    public const ECG_CENTER_SELECT = [
        'yes' => 'Yes',
        'no'  => 'No',
    ];

    public const GEE_CENTER_SELECT = [
        'yes' => 'Yes',
        'no'  => 'No',
    ];

    public const AGFA_CENTER_SELECT = [
        'yes' => 'Yes',
        'no'  => 'No',
    ];

    public const FIER_CENTER_SELECT = [
        'yes' => 'Yes',
        'no'  => 'No',
    ];

    public const KONICA_CENTER_SELECT = [
        'yes' => 'Yes',
        'no'  => 'No',
    ];

    public const SIMENCE_CENTER_SELECT = [
        'yes' => 'Yes',
        'no'  => 'No',
    ];

    public const PHILIPS_CENTER_SELECT = [
        'yes' => 'Yes',
        'no'  => 'No',
    ];

    public const MAMMOGRAPHY_CENTER_SELECT = [
        'yes' => 'Yes',
        'no'  => 'No',
    ];

    public $table = 'machine_status_profiles';

    public static $searchable = [
        'mri_center',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'hospital_name',
        'ct_center',
        'mri_center',
        'mammography_center',
        'fpd_center',
        'dr_center',
        'cr_center',
        'agfa_center',
        'konica_center',
        'fier_center',
        'ecg_center',
        'simence_center',
        'gee_center',
        'philips_center',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function machineAvailableProfileHospitalMediscans()
    {
        return $this->hasMany(HospitalMediscan::class, 'machine_available_profile_id', 'id');
    }

    public function machineAvailableProfileHospitalMentors()
    {
        return $this->hasMany(HospitalMentor::class, 'machine_available_profile_id', 'id');
    }

    public function machineAvailableProfileHospitalFiveCNetworks()
    {
        return $this->hasMany(HospitalFiveCNetwork::class, 'machine_available_profile_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
