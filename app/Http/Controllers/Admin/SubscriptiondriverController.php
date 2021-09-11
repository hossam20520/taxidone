<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroySubscriptiondriverRequest;
use App\Http\Requests\StoreSubscriptiondriverRequest;
use App\Http\Requests\UpdateSubscriptiondriverRequest;
use App\Models\Driver;
use App\Models\Subscription;
use App\Models\Subscriptiondriver;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SubscriptiondriverController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('subscriptiondriver_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subscriptiondrivers = Subscriptiondriver::with(['driver', 'subscription'])->get();

        $drivers = Driver::get();

        $subscriptions = Subscription::get();

        return view('admin.subscriptiondrivers.index', compact('subscriptiondrivers', 'drivers', 'subscriptions'));
    }

    public function create()
    {
        abort_if(Gate::denies('subscriptiondriver_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $drivers = Driver::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $subscriptions = Subscription::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.subscriptiondrivers.create', compact('drivers', 'subscriptions'));
    }

    public function store(StoreSubscriptiondriverRequest $request)
    {
        $subscriptiondriver = Subscriptiondriver::create($request->all());

        return redirect()->route('admin.subscriptiondrivers.index');
    }

    public function edit(Subscriptiondriver $subscriptiondriver)
    {
        abort_if(Gate::denies('subscriptiondriver_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $drivers = Driver::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $subscriptions = Subscription::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $subscriptiondriver->load('driver', 'subscription');

        return view('admin.subscriptiondrivers.edit', compact('drivers', 'subscriptions', 'subscriptiondriver'));
    }

    public function update(UpdateSubscriptiondriverRequest $request, Subscriptiondriver $subscriptiondriver)
    {
        $subscriptiondriver->update($request->all());

        return redirect()->route('admin.subscriptiondrivers.index');
    }

    public function show(Subscriptiondriver $subscriptiondriver)
    {
        abort_if(Gate::denies('subscriptiondriver_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subscriptiondriver->load('driver', 'subscription');

        return view('admin.subscriptiondrivers.show', compact('subscriptiondriver'));
    }

    public function destroy(Subscriptiondriver $subscriptiondriver)
    {
        abort_if(Gate::denies('subscriptiondriver_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subscriptiondriver->delete();

        return back();
    }

    public function massDestroy(MassDestroySubscriptiondriverRequest $request)
    {
        Subscriptiondriver::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
