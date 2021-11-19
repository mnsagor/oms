@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.priceAgreementPolicy.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.price-agreement-policies.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.priceAgreementPolicy.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $priceAgreementPolicy->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.priceAgreementPolicy.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $priceAgreementPolicy->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.priceAgreementPolicy.fields.xray') }}
                                    </th>
                                    <td>
                                        {{ $priceAgreementPolicy->xray }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.priceAgreementPolicy.fields.xray_single') }}
                                    </th>
                                    <td>
                                        {{ $priceAgreementPolicy->xray_single }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.priceAgreementPolicy.fields.xray_both') }}
                                    </th>
                                    <td>
                                        {{ $priceAgreementPolicy->xray_both }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.priceAgreementPolicy.fields.xray_contrast') }}
                                    </th>
                                    <td>
                                        {{ $priceAgreementPolicy->xray_contrast }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.priceAgreementPolicy.fields.ct') }}
                                    </th>
                                    <td>
                                        {{ $priceAgreementPolicy->ct }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.priceAgreementPolicy.fields.ct_brain') }}
                                    </th>
                                    <td>
                                        {{ $priceAgreementPolicy->ct_brain }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.priceAgreementPolicy.fields.ct_chest') }}
                                    </th>
                                    <td>
                                        {{ $priceAgreementPolicy->ct_chest }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.priceAgreementPolicy.fields.ct_other') }}
                                    </th>
                                    <td>
                                        {{ $priceAgreementPolicy->ct_other }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.priceAgreementPolicy.fields.whole_abdomen') }}
                                    </th>
                                    <td>
                                        {{ $priceAgreementPolicy->whole_abdomen }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.priceAgreementPolicy.fields.urogram') }}
                                    </th>
                                    <td>
                                        {{ $priceAgreementPolicy->urogram }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.priceAgreementPolicy.fields.mri') }}
                                    </th>
                                    <td>
                                        {{ $priceAgreementPolicy->mri }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.priceAgreementPolicy.fields.mri_brain') }}
                                    </th>
                                    <td>
                                        {{ $priceAgreementPolicy->mri_brain }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.priceAgreementPolicy.fields.mri_spine') }}
                                    </th>
                                    <td>
                                        {{ $priceAgreementPolicy->mri_spine }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.priceAgreementPolicy.fields.mri_other') }}
                                    </th>
                                    <td>
                                        {{ $priceAgreementPolicy->mri_other }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.price-agreement-policies.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.relatedData') }}
                </div>
                <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                    <li role="presentation">
                        <a href="#price_agreement_policy_hospital_mediscans" aria-controls="price_agreement_policy_hospital_mediscans" role="tab" data-toggle="tab">
                            {{ trans('cruds.hospitalMediscan.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#price_agreement_policy_hospital_mentors" aria-controls="price_agreement_policy_hospital_mentors" role="tab" data-toggle="tab">
                            {{ trans('cruds.hospitalMentor.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#price_agreement_policy_hospital_five_c_networks" aria-controls="price_agreement_policy_hospital_five_c_networks" role="tab" data-toggle="tab">
                            {{ trans('cruds.hospitalFiveCNetwork.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="price_agreement_policy_hospital_mediscans">
                        @includeIf('admin.priceAgreementPolicies.relationships.priceAgreementPolicyHospitalMediscans', ['hospitalMediscans' => $priceAgreementPolicy->priceAgreementPolicyHospitalMediscans])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="price_agreement_policy_hospital_mentors">
                        @includeIf('admin.priceAgreementPolicies.relationships.priceAgreementPolicyHospitalMentors', ['hospitalMentors' => $priceAgreementPolicy->priceAgreementPolicyHospitalMentors])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="price_agreement_policy_hospital_five_c_networks">
                        @includeIf('admin.priceAgreementPolicies.relationships.priceAgreementPolicyHospitalFiveCNetworks', ['hospitalFiveCNetworks' => $priceAgreementPolicy->priceAgreementPolicyHospitalFiveCNetworks])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection