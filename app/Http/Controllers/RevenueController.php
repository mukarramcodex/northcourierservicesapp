<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Parcel;
use App\Models\Revenue;
use App\Models\Staff;
use Illuminate\Http\Request;

class RevenueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $revenues = Revenue::with(['parcel','branch','staff'])->get();
        return view('revenues.index', compact('revenues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parcels = Parcel::all();
        $branches = Branch::all();
        $staff = Staff::all();
        return view('revenues.create', compact('parcels','branches','staff'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'parcel_id'   => 'nullable|exists:parcels,id',
            'branch_id'   => 'nullable|exists:branches,id',
            'staff_id'    => 'nullable|exists:staff,id',
            'amount'      => 'required|numeric',
            'revenue_date'=> 'nullable|date',
            'source'      => 'nullable|string',
            'notes'       => 'nullable|string',
        ]);

        Revenue::create($request->all());
        return redirect()->route('revenues.index')->with('success', 'Revenue added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Revenue $revenue)
    {
        return view('revenues.show', compact('revenue'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Revenue $revenue)
    {
        $parcels = Parcel::all();
        $branches = Branch::all();
        $staff = Staff::all();
        return view('revenues.edit', compact('revenue','parcels','branches','staff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Revenue $revenue)
    {
        $request->validate([
            'parcel_id'   => 'nullable|exists:parcels,id',
            'branch_id'   => 'nullable|exists:branches,id',
            'staff_id'    => 'nullable|exists:staff,id',
            'amount'      => 'required|numeric',
            'revenue_date'=> 'nullable|date',
            'source'      => 'nullable|string',
            'notes'       => 'nullable|string',
        ]);

        $revenue->update($request->all());
        return redirect()->route('revenues.index')->with('success', 'Revenue updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Revenue $revenue)
    {
        $revenue->delete();
        return redirect()->route('revenues.index')->with('success', 'Revenue deleted successfully.');
    }
}
