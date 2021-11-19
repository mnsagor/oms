<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConfigCtMachine extends Model
{
    use SoftDeletes;
    use Auditable;

    public const STATUS_SELECT = [
        'Active'   => 'Active',
        'Inactive' => 'Inactive',
    ];

    public $table = 'config_ct_machines';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'hospital_name',
        'machine_name',
        'ae_title',
        'port_number',
        'main_ip',
        'configured_ip',
        'host_name',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function ctConfigurationHospitalMediscans()
    {
        return $this->hasMany(HospitalMediscan::class, 'ct_configuration_id', 'id');
    }

    public function ctConfigurationHospitalMentors()
    {
        return $this->hasMany(HospitalMentor::class, 'ct_configuration_id', 'id');
    }

    public function ctConfigurationHospitalFiveCNetworks()
    {
        return $this->hasMany(HospitalFiveCNetwork::class, 'ct_configuration_id', 'id');
    }

    public function ctConfigurationVisitedHospitals()
    {
        return $this->hasMany(VisitedHospital::class, 'ct_configuration_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
