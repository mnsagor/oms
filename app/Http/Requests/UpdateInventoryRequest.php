<?php

namespace App\Http\Requests;

use App\Models\Inventory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateInventoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('inventory_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'purchase_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'warrenty' => [
                'string',
                'nullable',
            ],
            'price' => [
                'string',
                'required',
            ],
            'credit' => [
                'string',
                'required',
            ],
            'due' => [
                'string',
                'nullable',
            ],
            'is_damage' => [
                'string',
                'nullable',
            ],
            'stock_balance' => [
                'string',
                'nullable',
            ],
        ];
    }
}
