<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GlobalSearchController extends Controller
{
    private $models = [
        'User'                 => 'cruds.user.title',
        'HospitalMediscan'     => 'cruds.hospitalMediscan.title',
        'Modality'             => 'cruds.modality.title',
        'ProcedureType'        => 'cruds.procedureType.title',
        'Procedure'            => 'cruds.procedure.title',
        'Hm'                   => 'cruds.hm.title',
        'PriceAgreementPolicy' => 'cruds.priceAgreementPolicy.title',
        'HospitalHr'           => 'cruds.hospitalHr.title',
        'MachineStatusProfile' => 'cruds.machineStatusProfile.title',
        'HospitalMentor'       => 'cruds.hospitalMentor.title',
        'HospitalFiveCNetwork' => 'cruds.hospitalFiveCNetwork.title',
        'RadiologistMediscan'  => 'cruds.radiologistMediscan.title',
        'RadiologistMentor'    => 'cruds.radiologistMentor.title',
        'RadiologistFiveC'     => 'cruds.radiologistFiveC.title',
        'VisitedHospital'      => 'cruds.visitedHospital.title',
        'Inventory'            => 'cruds.inventory.title',
    ];

    public function search(Request $request)
    {
        $search = $request->input('search');

        if ($search === null || !isset($search['term'])) {
            abort(400);
        }

        $term           = $search['term'];
        $searchableData = [];
        foreach ($this->models as $model => $translation) {
            $modelClass = 'App\Models\\' . $model;
            $query      = $modelClass::query();

            $fields = $modelClass::$searchable;

            foreach ($fields as $field) {
                $query->orWhere($field, 'LIKE', '%' . $term . '%');
            }

            $results = $query->take(10)
                ->get();

            foreach ($results as $result) {
                $parsedData           = $result->only($fields);
                $parsedData['model']  = trans($translation);
                $parsedData['fields'] = $fields;
                $formattedFields      = [];
                foreach ($fields as $field) {
                    $formattedFields[$field] = Str::title(str_replace('_', ' ', $field));
                }
                $parsedData['fields_formated'] = $formattedFields;

                $parsedData['url'] = url('/admin/' . Str::plural(Str::snake($model, '-')) . '/' . $result->id . '/edit');

                $searchableData[] = $parsedData;
            }
        }

        return response()->json(['results' => $searchableData]);
    }
}
