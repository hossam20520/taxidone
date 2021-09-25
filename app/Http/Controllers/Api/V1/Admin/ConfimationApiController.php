<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreConfimationRequest;
use App\Http\Requests\UpdateConfimationRequest;
use App\Http\Resources\Admin\ConfimationResource;
use App\Models\Confimation;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ConfimationApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('confimation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ConfimationResource(Confimation::with(['user'])->get());
    }

    public function store(StoreConfimationRequest $request)
    {
        $confimation = Confimation::create($request->all());

        return (new ConfimationResource($confimation))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Confimation $confimation)
    {
        abort_if(Gate::denies('confimation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ConfimationResource($confimation->load(['user']));
    }

    public function update(UpdateConfimationRequest $request, Confimation $confimation)
    {
        $confimation->update($request->all());

        return (new ConfimationResource($confimation))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Confimation $confimation)
    {
        abort_if(Gate::denies('confimation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $confimation->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
