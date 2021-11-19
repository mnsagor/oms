<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConfigCrMachine extends Model
{
    use SoftDeletes;
    use Auditable;

    public const STATUS_SELECT = [
        'Active'   => 'Active',
        'Inactive' => 'Inactive',
    ];

    public $table = 'config_cr_machines';

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

    public function crConfigurationHospitalMediscans()
    {
        return $this->hasMany(HospitalMediscan::class, 'cr_configuration_id', 'id');
    }

    public function crConfigurationHospitalMentors()
    {
        return $this->hasMany(HospitalMentor::class, 'cr_configuration_id', 'id');
    }

    public function crConfigurationHospitalFiveCNetworks()
    {
        return $this->hasMany(HospitalFiveCNetwork::class, 'cr_configuration_id', 'id');
    }

    public function crConfigurationVisitedHospitals()
    {
        return $this->hasMany(VisitedHospital::class, 'cr_configuration_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
