<?php

namespace App\Http\Controllers;

use App\Http\Requests\Magnitudes\StoreMagnitudeRequest;
use App\Http\Requests\Magnitudes\UpdateMagnitudeRequest;
use App\Http\Resources\Magnitude as MagnitudeResource;
use App\Models\Magnitude;

class MagnitudeController extends Controller
{
    public function index() {

    }

    public function store(StoreMagnitudeRequest $request)
    {
        $magnitude       = new Magnitude;
        $magnitude->name = $request->name;
        $magnitude->save();

        return new MagnitudeResource($magnitude);
    }

    public function update(UpdateMagnitudeRequest $request, Magnitude $magnitude)
    {
        $magnitude->name = $request->get('name', $magnitude->name);
        $magnitude->save();

        return new MagnitudeResource($magnitude);
    }

    public function destroy(Magnitude $magnitude)
    {
        $magnitude->delete();

        return response(null, 204);
    }

}
