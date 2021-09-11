<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyComplaintRequest;
use App\Http\Requests\StoreComplaintRequest;
use App\Http\Requests\UpdateComplaintRequest;
use App\Models\Client;
use App\Models\Complaint;
use App\Models\Travel;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ComplaintsController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('complaint_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $complaints = Complaint::with(['client', 'trip'])->get();

        $clients = Client::get();

        $travel = Travel::get();

        return view('admin.complaints.index', compact('complaints', 'clients', 'travel'));
    }

    public function create()
    {
        abort_if(Gate::denies('complaint_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = Client::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $trips = Travel::pluck('travel', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.complaints.create', compact('clients', 'trips'));
    }

    public function store(StoreComplaintRequest $request)
    {
        $complaint = Complaint::create($request->all());

        return redirect()->route('admin.complaints.index');
    }

    public function edit(Complaint $complaint)
    {
        abort_if(Gate::denies('complaint_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = Client::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $trips = Travel::pluck('travel', 'id')->prepend(trans('global.pleaseSelect'), '');

        $complaint->load('client', 'trip');

        return view('admin.complaints.edit', compact('clients', 'trips', 'complaint'));
    }

    public function update(UpdateComplaintRequest $request, Complaint $complaint)
    {
        $complaint->update($request->all());

        return redirect()->route('admin.complaints.index');
    }

    public function show(Complaint $complaint)
    {
        abort_if(Gate::denies('complaint_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $complaint->load('client', 'trip');

        return view('admin.complaints.show', compact('complaint'));
    }

    public function destroy(Complaint $complaint)
    {
        abort_if(Gate::denies('complaint_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $complaint->delete();

        return back();
    }

    public function massDestroy(MassDestroyComplaintRequest $request)
    {
        Complaint::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
