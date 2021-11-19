<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConfigMammographyMachine extends Model
{
    use SoftDeletes;
    use Auditable;

    public const STATUS_SELECT = [
        'Active'   => 'Active',
        'Inactive' => 'Inactive',
    ];

    public $table = 'config_mammography_machines';

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

    public function mmConfigurationHospitalMediscans()
    {
        return $this->hasMany(HospitalMediscan::class, 'mm_configuration_id', 'id');
    }

    public function mmConfigurationHospitalMentors()
    {
        return $this->hasMany(HospitalMentor::class, 'mm_configuration_id', 'id');
    }

    public function mmConfigurationHospitalFiveCNetworks()
    {
        return $this->hasMany(HospitalFiveCNetwork::class, 'mm_configuration_id', 'id');
    }

    public function mmConfigurationVisitedHospitals()
    {
        return $this->hasMany(VisitedHospital::class, 'mm_configuration_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
