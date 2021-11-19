<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class HospitalFiveCNetwork extends Model implements HasMedia
{
    use SoftDeletes;
    use HasMediaTrait;
    use Auditable;

    public const CONNECTION_STATUS_SELECT = [
        'Active'   => 'Active',
        'Inactive' => 'Inactive',
    ];

    public const CR_ROUTER_LICENSE_STATUS_SELECT = [
        '1' => 'Permanent',
        '2' => 'Temporary',
        '3' => 'Expired',
    ];

    public const DR_ROUTER_LICENSE_STATUS_SELECT = [
        '1' => 'Permanent',
        '2' => 'Temporary',
        '3' => 'Expired',
    ];

    public const MM_ROUTER_LICENSE_STATUS_SELECT = [
        '1' => 'Permanent',
        '2' => 'Temporary',
        '3' => 'Expired',
    ];

    public const CT_ROUTER_LICENSE_STATUS_SELECT = [
        '1' => 'Permanent',
        '2' => 'Temporary',
        '3' => 'Expired',
    ];

    public const MRI_ROUTER_LICENSE_STATUS_SELECT = [
        '1' => 'Permanent',
        '2' => 'Temporary',
        '3' => 'Expired',
    ];

    public $table = 'hospital_five_c_networks';

    public static $searchable = [
        'name',
        'user_name',
        'email',
        'bill_mail',
        'others_company_name',
    ];

    protected $hidden = [
        'password',
    ];

    protected $appends = [
        'agreement_attachment',
    ];

    protected $dates = [
        'connection_date',
        'router_reinstallation_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'user_name',
        'password',
        'email',
        'address',
        'price_agreement_policy_id',
        'connection_date',
        'cr_configuration_id',
        'cr_router_license_status',
        'dr_configuration_id',
        'dr_router_license_status',
        'mm_configuration_id',
        'mm_router_license_status',
        'ct_configuration_id',
        'ct_router_license_status',
        'mri_configuration_id',
        'mri_router_license_status',
        'dropbox_mail_ip',
        'dropbox_password',
        'hospital_hr_id',
        'profit_sharing_rate',
        'bill_mail',
        'management_software_propose',
        'installed_by',
        'mininum_charge',
        'annual_fee',
        'others_company_name',
        'router_reinstallation_date',
        'connection_status',
        'conncetion_status_reason',
        'machine_available_profile_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function hospitalNameRadiologistFiveCs()
    {
        return $this->hasMany(RadiologistFiveC::class, 'hospital_name_id', 'id');
    }

    public function price_agreement_policy()
    {
        return $this->belongsTo(PriceAgreementPolicy::class, 'price_agreement_policy_id');
    }

    public function getConnectionDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setConnectionDateAttribute($value)
    {
        $this->attributes['connection_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function cr_configuration()
    {
        return $this->belongsTo(ConfigCrMachine::class, 'cr_configuration_id');
    }

    public function dr_configuration()
    {
        return $this->belongsTo(ConfigDrMachine::class, 'dr_configuration_id');
    }

    public function mm_configuration()
    {
        return $this->belongsTo(ConfigMammographyMachine::class, 'mm_configuration_id');
    }

    public function ct_configuration()
    {
        return $this->belongsTo(ConfigCtMachine::class, 'ct_configuration_id');
    }

    public function mri_configuration()
    {
        return $this->belongsTo(ConfigMriMachine::class, 'mri_configuration_id');
    }

    public function hospital_hr()
    {
        return $this->belongsTo(HospitalHr::class, 'hospital_hr_id');
    }

    public function getRouterReinstallationDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setRouterReinstallationDateAttribute($value)
    {
        $this->attributes['router_reinstallation_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getAgreementAttachmentAttribute()
    {
        return $this->getMedia('agreement_attachment');
    }

    public function machine_available_profile()
    {
        return $this->belongsTo(MachineStatusProfile::class, 'machine_available_profile_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
