<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Http\Resources\Admin\CarResource;
use App\Models\Car;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CarsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('car_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CarResource(Car::all());
    }

    public function store(StoreCarRequest $request)
    {
        $car = Car::create($request->all());

        if ($request->input('identification_number_photo', false)) {
            $car->addMedia(storage_path('tmp/uploads/' . basename($request->input('identification_number_photo'))))->toMediaCollection('identification_number_photo');
        }

        if ($request->input('license_number_photo', false)) {
            $car->addMedia(storage_path('tmp/uploads/' . basename($request->input('license_number_photo'))))->toMediaCollection('license_number_photo');
        }

        if ($request->input('photo', false)) {
            $car->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        return (new CarResource($car))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Car $car)
    {
        abort_if(Gate::denies('car_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CarResource($car);
    }

    public function update(UpdateCarRequest $request, Car $car)
    {
        $car->update($request->all());

        if ($request->input('identification_number_photo', false)) {
            if (!$car->identification_number_photo || $request->input('identification_number_photo') !== $car->identification_number_photo->file_name) {
                if ($car->identification_number_photo) {
                    $car->identification_number_photo->delete();
                }
                $car->addMedia(storage_path('tmp/uploads/' . basename($request->input('identification_number_photo'))))->toMediaCollection('identification_number_photo');
            }
        } elseif ($car->identification_number_photo) {
            $car->identification_number_photo->delete();
        }

        if ($request->input('license_number_photo', false)) {
            if (!$car->license_number_photo || $request->input('license_number_photo') !== $car->license_number_photo->file_name) {
                if ($car->license_number_photo) {
                    $car->license_number_photo->delete();
                }
                $car->addMedia(storage_path('tmp/uploads/' . basename($request->input('license_number_photo'))))->toMediaCollection('license_number_photo');
            }
        } elseif ($car->license_number_photo) {
            $car->license_number_photo->delete();
        }

        if ($request->input('photo', false)) {
            if (!$car->photo || $request->input('photo') !== $car->photo->file_name) {
                if ($car->photo) {
                    $car->photo->delete();
                }
                $car->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($car->photo) {
            $car->photo->delete();
        }

        return (new CarResource($car))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Car $car)
    {
        abort_if(Gate::denies('car_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $car->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
