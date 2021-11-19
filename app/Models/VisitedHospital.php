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

class VisitedHospital extends Model implements HasMedia
{
    use SoftDeletes;
    use HasMediaTrait;
    use Auditable;

    public const STATUS_SELECT = [
        'New' => 'New',
        'Old' => 'Old',
    ];

    public const IS_ONLINE_SELECT = [
        'Yes' => 'Yes',
        'No'  => 'No',
    ];

    public $table = 'visited_hospitals';

    public static $searchable = [
        'name',
        'email',
        'dealing_tech',
        'dealing_tech_number',
        'bill_send_email',
    ];

    protected $appends = [
        'documents',
    ];

    protected $dates = [
        'visited_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'status',
        'email',
        'address',
        'is_online',
        'visited_date',
        'visited_by',
        'other_company_name',
        'other_company_price',
        'cr_configuration_id',
        'dr_configuration_id',
        'ct_configuration_id',
        'mri_configuration_id',
        'mm_configuration_id',
        'hospital_hr_id',
        'dealing_tech',
        'dealing_tech_number',
        'bill_send_email',
        'management_software_propose',
        'comments',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getVisitedDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setVisitedDateAttribute($value)
    {
        $this->attributes['visited_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function cr_configuration()
    {
        return $this->belongsTo(ConfigCrMachine::class, 'cr_configuration_id');
    }

    public function dr_configuration()
    {
        return $this->belongsTo(ConfigDrMachine::class, 'dr_configuration_id');
    }

    public function ct_configuration()
    {
        return $this->belongsTo(ConfigCtMachine::class, 'ct_configuration_id');
    }

    public function mri_configuration()
    {
        return $this->belongsTo(ConfigMriMachine::class, 'mri_configuration_id');
    }

    public function mm_configuration()
    {
        return $this->belongsTo(ConfigMammographyMachine::class, 'mm_configuration_id');
    }

    public function hospital_hr()
    {
        return $this->belongsTo(HospitalHr::class, 'hospital_hr_id');
    }

    public function getDocumentsAttribute()
    {
        return $this->getMedia('documents');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
