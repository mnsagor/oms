<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PriceAgreementPolicy extends Model
{
    use SoftDeletes;
    use Auditable;

    public static $searchable = [
        'name',
    ];

    public $table = 'price_agreement_policies';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'xray',
        'xray_single',
        'xray_both',
        'xray_contrast',
        'ct',
        'ct_brain',
        'ct_chest',
        'ct_other',
        'whole_abdomen',
        'urogram',
        'mri',
        'mri_brain',
        'mri_spine',
        'mri_other',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function priceAgreementPolicyHospitalMediscans()
    {
        return $this->hasMany(HospitalMediscan::class, 'price_agreement_policy_id', 'id');
    }

    public function priceAgreementPolicyHospitalMentors()
    {
        return $this->hasMany(HospitalMentor::class, 'price_agreement_policy_id', 'id');
    }

    public function priceAgreementPolicyHospitalFiveCNetworks()
    {
        return $this->hasMany(HospitalFiveCNetwork::class, 'price_agreement_policy_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
