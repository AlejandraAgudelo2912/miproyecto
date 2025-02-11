<?php

namespace App\Http\Controllers;

use App\Models\ObservationPoint;
use Illuminate\Http\Request;

class ObservationPointController extends Controller
{
    public function index()
    {
        $points = ObservationPoint::all();
        return view('map.index', compact('points'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

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
