<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCarRequest;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Models\Car;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class CarsController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('car_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cars = Car::with(['media'])->get();

        return view('admin.cars.index', compact('cars'));
    }

    public function create()
    {
        abort_if(Gate::denies('car_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cars.create');
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

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $car->id]);
        }

        return redirect()->route('admin.cars.index');
    }

    public function edit(Car $car)
    {
        abort_if(Gate::denies('car_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cars.edit', compact('car'));
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

        return redirect()->route('admin.cars.index');
    }

    public function show(Car $car)
    {
        abort_if(Gate::denies('car_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cars.show', compact('car'));
    }

    public function destroy(Car $car)
    {
        abort_if(Gate::denies('car_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $car->delete();

        return back();
    }

    public function massDestroy(MassDestroyCarRequest $request)
    {
        Car::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('car_create') && Gate::denies('car_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Car();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
