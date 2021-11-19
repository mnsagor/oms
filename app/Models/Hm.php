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

class Hm extends Model implements HasMedia
{
    use SoftDeletes;
    use HasMediaTrait;
    use Auditable;

    public const CONNECTION_TYPE_SELECT = [
        'Online'  => 'Online',
        'Offline' => 'Offline',
    ];

    public const CONNECTION_STATUS_SELECT = [
        'Active'   => 'Active',
        'Inactive' => 'Inactive',
    ];

    public $table = 'hms';

    public static $searchable = [
        'name',
        'username',
        'email',
        'chairman_name',
        'chairman_number',
        'md_name',
        'md_number',
        'director_name',
        'director_number',
        'manager_name',
        'manager_number',
        'am_name',
        'am_number',
        'reception_all_numbers',
        'ultra_sonogram_assistant_name',
        'ultra_sonogram_assistant_number',
        'medical_technologist_lab_name',
        'medical_technologist_lab_number',
        'medical_technologist_xray_name',
        'medical_technologist_xray_number',
        'accounts_department_name',
        'accounts_department_number',
        'receptionist_name',
        'receptionist_number',
        'accountant_name',
        'accountant_number',
        'bill_send_mail',
        'it_person_name',
    ];

    protected $hidden = [
        'password',
    ];

    protected $appends = [
        'agreement_attachment',
    ];

    protected $dates = [
        'connection_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'username',
        'password',
        'address',
        'email',
        'connection_date',
        'network_ip',
        'pathology_ip',
        'reception_ip',
        'xray_ip',
        'ultrasonography_ip',
        'admin_ip',
        'chairman_name',
        'chairman_number',
        'md_name',
        'md_number',
        'director_name',
        'director_number',
        'manager_name',
        'manager_number',
        'am_name',
        'am_number',
        'reception_all_numbers',
        'ultra_sonogram_assistant_name',
        'ultra_sonogram_assistant_number',
        'medical_technologist_lab_name',
        'medical_technologist_lab_number',
        'medical_technologist_xray_name',
        'medical_technologist_xray_number',
        'accounts_department_name',
        'accounts_department_number',
        'receptionist_name',
        'receptionist_number',
        'accountant_name',
        'accountant_number',
        'bill_send_mail',
        'previous_company',
        'it_person_name',
        'it_person_number',
        'installed_by',
        'annual_maintenance_charge',
        'connection_status',
        'conncetion_status_reason',
        'connection_type',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getConnectionDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setConnectionDateAttribute($value)
    {
        $this->attributes['connection_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getAgreementAttachmentAttribute()
    {
        return $this->getMedia('agreement_attachment');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
