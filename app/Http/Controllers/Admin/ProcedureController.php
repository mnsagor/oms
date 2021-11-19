<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProcedureRequest;
use App\Http\Requests\StoreProcedureRequest;
use App\Http\Requests\UpdateProcedureRequest;
use App\Models\Modality;
use App\Models\Procedure;
use App\Models\ProcedureType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProcedureController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('procedure_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $procedures = Procedure::with(['modality_name', 'procedure_type'])->get();

        $modalities = Modality::get();

        $procedure_types = ProcedureType::get();

        return view('admin.procedures.index', compact('procedures', 'modalities', 'procedure_types'));
    }

    public function create()
    {
        abort_if(Gate::denies('procedure_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $modality_names = Modality::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $procedure_types = ProcedureType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.procedures.create', compact('modality_names', 'procedure_types'));
    }

    public function store(StoreProcedureRequest $request)
    {
        $procedure = Procedure::create($request->all());

        return redirect()->route('admin.procedures.index');
    }

    public function edit(Procedure $procedure)
    {
        abort_if(Gate::denies('procedure_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $modality_names = Modality::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $procedure_types = ProcedureType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $procedure->load('modality_name', 'procedure_type');

        return view('admin.procedures.edit', compact('modality_names', 'procedure_types', 'procedure'));
    }

    public function update(UpdateProcedureRequest $request, Procedure $procedure)
    {
        $procedure->update($request->all());

        return redirect()->route('admin.procedures.index');
    }

    public function show(Procedure $procedure)
    {
        abort_if(Gate::denies('procedure_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $procedure->load('modality_name', 'procedure_type');

        return view('admin.procedures.show', compact('procedure'));
    }

    public function destroy(Procedure $procedure)
    {
        abort_if(Gate::denies('procedure_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $procedure->delete();

        return back();
    }

    public function massDestroy(MassDestroyProcedureRequest $request)
    {
        Procedure::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
