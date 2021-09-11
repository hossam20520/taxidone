<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTravelRequest;
use App\Http\Requests\StoreTravelRequest;
use App\Http\Requests\UpdateTravelRequest;
use App\Models\Client;
use App\Models\Driver;
use App\Models\Travel;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TravelsController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('travel_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $travel = Travel::with(['client', 'driver'])->get();

        $clients = Client::get();

        $drivers = Driver::get();

        return view('admin.travel.index', compact('travel', 'clients', 'drivers'));
    }

    public function create()
    {
        abort_if(Gate::denies('travel_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = Client::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $drivers = Driver::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.travel.create', compact('clients', 'drivers'));
    }

    public function store(StoreTravelRequest $request)
    {
        $travel = Travel::create($request->all());

        return redirect()->route('admin.travel.index');
    }

    public function edit(Travel $travel)
    {
        abort_if(Gate::denies('travel_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = Client::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $drivers = Driver::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $travel->load('client', 'driver');

        return view('admin.travel.edit', compact('clients', 'drivers', 'travel'));
    }

    public function update(UpdateTravelRequest $request, Travel $travel)
    {
        $travel->update($request->all());

        return redirect()->route('admin.travel.index');
    }

    public function show(Travel $travel)
    {
        abort_if(Gate::denies('travel_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $travel->load('client', 'driver');

        return view('admin.travel.show', compact('travel'));
    }

    public function destroy(Travel $travel)
    {
        abort_if(Gate::denies('travel_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $travel->delete();

        return back();
    }

    public function massDestroy(MassDestroyTravelRequest $request)
    {
        Travel::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
