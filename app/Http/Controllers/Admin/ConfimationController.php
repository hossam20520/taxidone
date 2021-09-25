<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyConfimationRequest;
use App\Http\Requests\StoreConfimationRequest;
use App\Http\Requests\UpdateConfimationRequest;
use App\Models\Confimation;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ConfimationController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('confimation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $confimations = Confimation::with(['user'])->get();

        $users = User::get();

        return view('admin.confimations.index', compact('confimations', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('confimation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.confimations.create', compact('users'));
    }

    public function store(StoreConfimationRequest $request)
    {
        $confimation = Confimation::create($request->all());

        return redirect()->route('admin.confimations.index');
    }

    public function edit(Confimation $confimation)
    {
        abort_if(Gate::denies('confimation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $confimation->load('user');

        return view('admin.confimations.edit', compact('users', 'confimation'));
    }

    public function update(UpdateConfimationRequest $request, Confimation $confimation)
    {
        $confimation->update($request->all());

        return redirect()->route('admin.confimations.index');
    }

    public function show(Confimation $confimation)
    {
        abort_if(Gate::denies('confimation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $confimation->load('user');

        return view('admin.confimations.show', compact('confimation'));
    }

    public function destroy(Confimation $confimation)
    {
        abort_if(Gate::denies('confimation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $confimation->delete();

        return back();
    }

    public function massDestroy(MassDestroyConfimationRequest $request)
    {
        Confimation::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
