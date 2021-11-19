<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyPriceAgreementPolicyRequest;
use App\Http\Requests\StorePriceAgreementPolicyRequest;
use App\Http\Requests\UpdatePriceAgreementPolicyRequest;
use App\Models\PriceAgreementPolicy;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PriceAgreementPolicyController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('price_agreement_policy_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = PriceAgreementPolicy::query()->select(sprintf('%s.*', (new PriceAgreementPolicy())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'price_agreement_policy_show';
                $editGate = 'price_agreement_policy_edit';
                $deleteGate = 'price_agreement_policy_delete';
                $crudRoutePart = 'price-agreement-policies';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('xray', function ($row) {
                return $row->xray ? $row->xray : '';
            });
            $table->editColumn('xray_single', function ($row) {
                return $row->xray_single ? $row->xray_single : '';
            });
            $table->editColumn('xray_both', function ($row) {
                return $row->xray_both ? $row->xray_both : '';
            });
            $table->editColumn('xray_contrast', function ($row) {
                return $row->xray_contrast ? $row->xray_contrast : '';
            });
            $table->editColumn('ct', function ($row) {
                return $row->ct ? $row->ct : '';
            });
            $table->editColumn('ct_brain', function ($row) {
                return $row->ct_brain ? $row->ct_brain : '';
            });
            $table->editColumn('ct_chest', function ($row) {
                return $row->ct_chest ? $row->ct_chest : '';
            });
            $table->editColumn('ct_other', function ($row) {
                return $row->ct_other ? $row->ct_other : '';
            });
            $table->editColumn('whole_abdomen', function ($row) {
                return $row->whole_abdomen ? $row->whole_abdomen : '';
            });
            $table->editColumn('urogram', function ($row) {
                return $row->urogram ? $row->urogram : '';
            });
            $table->editColumn('mri', function ($row) {
                return $row->mri ? $row->mri : '';
            });
            $table->editColumn('mri_brain', function ($row) {
                return $row->mri_brain ? $row->mri_brain : '';
            });
            $table->editColumn('mri_spine', function ($row) {
                return $row->mri_spine ? $row->mri_spine : '';
            });
            $table->editColumn('mri_other', function ($row) {
                return $row->mri_other ? $row->mri_other : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.priceAgreementPolicies.index');
    }

    public function create()
    {
        abort_if(Gate::denies('price_agreement_policy_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.priceAgreementPolicies.create');
    }

    public function store(StorePriceAgreementPolicyRequest $request)
    {
        $priceAgreementPolicy = PriceAgreementPolicy::create($request->all());

        return redirect()->route('admin.price-agreement-policies.index');
    }

    public function edit(PriceAgreementPolicy $priceAgreementPolicy)
    {
        abort_if(Gate::denies('price_agreement_policy_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.priceAgreementPolicies.edit', compact('priceAgreementPolicy'));
    }

    public function update(UpdatePriceAgreementPolicyRequest $request, PriceAgreementPolicy $priceAgreementPolicy)
    {
        $priceAgreementPolicy->update($request->all());

        return redirect()->route('admin.price-agreement-policies.index');
    }

    public function show(PriceAgreementPolicy $priceAgreementPolicy)
    {
        abort_if(Gate::denies('price_agreement_policy_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $priceAgreementPolicy->load('priceAgreementPolicyHospitalMediscans', 'priceAgreementPolicyHospitalMentors', 'priceAgreementPolicyHospitalFiveCNetworks');

        return view('admin.priceAgreementPolicies.show', compact('priceAgreementPolicy'));
    }

    public function destroy(PriceAgreementPolicy $priceAgreementPolicy)
    {
        abort_if(Gate::denies('price_agreement_policy_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $priceAgreementPolicy->delete();

        return back();
    }

    public function massDestroy(MassDestroyPriceAgreementPolicyRequest $request)
    {
        PriceAgreementPolicy::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
