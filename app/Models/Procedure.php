<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Procedure extends Model
{
    use SoftDeletes;

    public const STATUS_SELECT = [
        'Active'   => 'Active',
        'Inactive' => 'Inactive',
    ];

    public $table = 'procedures';

    public static $searchable = [
        'name',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'status',
        'modality_name_id',
        'procedure_type_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function modality_name()
    {
        return $this->belongsTo(Modality::class, 'modality_name_id');
    }

    public function procedure_type()
    {
        return $this->belongsTo(ProcedureType::class, 'procedure_type_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
