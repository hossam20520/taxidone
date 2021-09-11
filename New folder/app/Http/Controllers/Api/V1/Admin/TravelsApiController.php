<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTravelRequest;
use App\Http\Requests\UpdateTravelRequest;
use App\Http\Resources\Admin\TravelResource;
use App\Models\Travel;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TravelsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('travel_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TravelResource(Travel::with(['client', 'driver'])->get());
    }

    public function store(StoreTravelRequest $request)
    {
        $travel = Travel::create($request->all());

        return (new TravelResource($travel))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Travel $travel)
    {
        abort_if(Gate::denies('travel_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TravelResource($travel->load(['client', 'driver']));
    }

    public function update(UpdateTravelRequest $request, Travel $travel)
    {
        $travel->update($request->all());

        return (new TravelResource($travel))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Travel $travel)
    {
        abort_if(Gate::denies('travel_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $travel->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
