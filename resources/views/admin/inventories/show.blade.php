@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.inventory.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.inventories.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.inventory.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $inventory->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.inventory.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $inventory->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.inventory.fields.purchase_date') }}
                                    </th>
                                    <td>
                                        {{ $inventory->purchase_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.inventory.fields.warrenty') }}
                                    </th>
                                    <td>
                                        {{ $inventory->warrenty }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.inventory.fields.price') }}
                                    </th>
                                    <td>
                                        {{ $inventory->price }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.inventory.fields.credit') }}
                                    </th>
                                    <td>
                                        {{ $inventory->credit }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.inventory.fields.due') }}
                                    </th>
                                    <td>
                                        {{ $inventory->due }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.inventory.fields.is_damage') }}
                                    </th>
                                    <td>
                                        {{ $inventory->is_damage }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.inventory.fields.stock_balance') }}
                                    </th>
                                    <td>
                                        {{ $inventory->stock_balance }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.inventory.fields.supplier_info') }}
                                    </th>
                                    <td>
                                        {!! $inventory->supplier_info !!}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.inventories.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection