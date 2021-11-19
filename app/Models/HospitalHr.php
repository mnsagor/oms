<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class HospitalHr extends Model implements HasMedia
{
    use SoftDeletes;
    use HasMediaTrait;
    use Auditable;

    public $table = 'hospital_hrs';

    public static $searchable = [
        'hopital_name',
        'chairman_number',
        'md_number',
        'director_number',
        'manager_number',
        'am_number',
        'accountant_number',
        'mt_number_1',
        'mt_number_3',
        'mt_number_4',
        'mt_number_5',
        'ct_eng_number',
        'it_person_number',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'hopital_name',
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
        'reception_details',
        'accountant_name',
        'accountant_number',
        'mt_name_1',
        'mt_number_1',
        'mt_name_2',
        'mt_number_2',
        'mt_name_3',
        'mt_number_3',
        'mt_name_4',
        'mt_number_4',
        'mt_name_5',
        'mt_number_5',
        'ct_eng_name',
        'ct_eng_number',
        'it_person_name',
        'it_person_number',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function hospitalHrHospitalMediscans()
    {
        return $this->hasMany(HospitalMediscan::class, 'hospital_hr_id', 'id');
    }

    public function hospitalHrHospitalMentors()
    {
        return $this->hasMany(HospitalMentor::class, 'hospital_hr_id', 'id');
    }

    public function hospitalHrHospitalFiveCNetworks()
    {
        return $this->hasMany(HospitalFiveCNetwork::class, 'hospital_hr_id', 'id');
    }

    public function hospitalHrVisitedHospitals()
    {
        return $this->hasMany(VisitedHospital::class, 'hospital_hr_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
