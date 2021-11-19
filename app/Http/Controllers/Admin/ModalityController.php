<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyModalityRequest;
use App\Http\Requests\StoreModalityRequest;
use App\Http\Requests\UpdateModalityRequest;
use App\Models\Modality;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ModalityController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('modality_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $modalities = Modality::all();

        return view('admin.modalities.index', compact('modalities'));
    }

    public function create()
    {
        abort_if(Gate::denies('modality_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.modalities.create');
    }

    public function store(StoreModalityRequest $request)
    {
        $modality = Modality::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $modality->id]);
        }

        return redirect()->route('admin.modalities.index');
    }

    public function edit(Modality $modality)
    {
        abort_if(Gate::denies('modality_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.modalities.edit', compact('modality'));
    }

    public function update(UpdateModalityRequest $request, Modality $modality)
    {
        $modality->update($request->all());

        return redirect()->route('admin.modalities.index');
    }

    public function show(Modality $modality)
    {
        abort_if(Gate::denies('modality_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.modalities.show', compact('modality'));
    }

    public function destroy(Modality $modality)
    {
        abort_if(Gate::denies('modality_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $modality->delete();

        return back();
    }

    public function massDestroy(MassDestroyModalityRequest $request)
    {
        Modality::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('modality_create') && Gate::denies('modality_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Modality();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
