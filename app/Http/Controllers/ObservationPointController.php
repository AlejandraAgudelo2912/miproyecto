<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreObservationPointRequest;
use App\Models\ObservationPoint;

class ObservationPointController extends Controller
{
    public function index()
    {
        $points = ObservationPoint::all();
        return view('map.index', compact('points'));
    }

    public function store(StoreObservationPointRequest $request)
    {
        $request->validated();

        ObservationPoint::create([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'description' => $request->description,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        return redirect()->route('map.index')->with('success', 'Punto de observación añadido.');
    }
}
