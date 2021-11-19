<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProcedureTypeRequest;
use App\Http\Requests\StoreProcedureTypeRequest;
use App\Http\Requests\UpdateProcedureTypeRequest;
use App\Models\ProcedureType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProcedureTypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('procedure_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $procedureTypes = ProcedureType::all();

        return view('admin.procedureTypes.index', compact('procedureTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('procedure_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.procedureTypes.create');
    }

    public function store(StoreProcedureTypeRequest $request)
    {
        $procedureType = ProcedureType::create($request->all());

        return redirect()->route('admin.procedure-types.index');
    }

    public function edit(ProcedureType $procedureType)
    {
        abort_if(Gate::denies('procedure_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.procedureTypes.edit', compact('procedureType'));
    }

    public function update(UpdateProcedureTypeRequest $request, ProcedureType $procedureType)
    {
        $procedureType->update($request->all());

        return redirect()->route('admin.procedure-types.index');
    }

    public function show(ProcedureType $procedureType)
    {
        abort_if(Gate::denies('procedure_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.procedureTypes.show', compact('procedureType'));
    }

    public function destroy(ProcedureType $procedureType)
    {
        abort_if(Gate::denies('procedure_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $procedureType->delete();

        return back();
    }

    public function massDestroy(MassDestroyProcedureTypeRequest $request)
    {
        ProcedureType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
