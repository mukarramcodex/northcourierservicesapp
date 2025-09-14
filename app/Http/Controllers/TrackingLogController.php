<?php

namespace App\Http\Controllers;

use App\Models\Parcel;
use App\Models\TrackingLog;
use Illuminate\Http\Request;

class TrackingLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Parcel $parcel)
    {
        $trackinglogs = $parcel->trackinglog()->latest()->get();
        return view('trackinglogs.index', compact('parcel', 'trackinglog'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Parcel $parcel)
    {
        return view('trackinglogs.create', compact('parcel'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Parcel $parcel)
    {
        $request->validate([
            'status' => 'required|string',
            'location' => 'nullable|string',
            'remarks' => 'nullable|string',
        ]);

        $parcel->trackinglog()->create([
            'status' => $request->status,
            'location' => $request->location,
            'remarks' => $request->remarks,
            'logged_at' => now(),
        ]);

        $parcel->update(['status' => $request->status]);

        return redirect()->route('trackinglogs.index', $parcel)
                         ->with('success', 'Tracking log added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TrackingLog $trackingLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TrackingLog $trackingLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TrackingLog $trackingLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TrackingLog $trackingLog)
    {
        //
    }
}
