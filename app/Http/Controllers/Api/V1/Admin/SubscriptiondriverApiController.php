<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubscriptiondriverRequest;
use App\Http\Requests\UpdateSubscriptiondriverRequest;
use App\Http\Resources\Admin\SubscriptiondriverResource;
use App\Models\Subscriptiondriver;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SubscriptiondriverApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('subscriptiondriver_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SubscriptiondriverResource(Subscriptiondriver::with(['driver', 'subscription'])->get());
    }

    public function store(StoreSubscriptiondriverRequest $request)
    {
        $subscriptiondriver = Subscriptiondriver::create($request->all());

        return (new SubscriptiondriverResource($subscriptiondriver))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Subscriptiondriver $subscriptiondriver)
    {
        abort_if(Gate::denies('subscriptiondriver_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SubscriptiondriverResource($subscriptiondriver->load(['driver', 'subscription']));
    }

    public function update(UpdateSubscriptiondriverRequest $request, Subscriptiondriver $subscriptiondriver)
    {
        $subscriptiondriver->update($request->all());

        return (new SubscriptiondriverResource($subscriptiondriver))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Subscriptiondriver $subscriptiondriver)
    {
        abort_if(Gate::denies('subscriptiondriver_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subscriptiondriver->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
