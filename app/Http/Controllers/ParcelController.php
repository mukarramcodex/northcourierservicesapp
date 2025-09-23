<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Customer;
use App\Models\Parcel;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Picqer\Barcode\BarcodeGenerator;
use Picqer\Barcode\BarcodeGeneratorSVG;
use Spatie\Browsershot\Browsershot;

class ParcelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parcels = Parcel::with(['customer', 'originBranch', 'destinationBranch', 'staff'])->get();
        return view('parcels.index', compact('parcels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all();
        $branches  = Branch::all();
        $staff     = Staff::all();
        return view('parcels.create', compact('customers', 'branches', 'staff'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tracking_number'   => 'required|unique:parcels,tracking_number',
            'booking_id'        => 'required|unique:parcels,booking_id',
            'receipt_number'    => 'required|unique:parcels,receipt_number',
            'customer_id'       => 'nullable|exists:customers,id',
            'receiver_name'     => 'required|string',
            'receiver_phone'    => 'required|numeric',
            'receiver_address'  => 'required|string',
            'receiver_cnic'     => 'required|numeric',
            'parcel_type'       => 'nullable|string',
            'weight'            => 'nullable|numeric',
            'dimension'         => 'required|string',
            'goods_description' => 'required|string',
            'remarks'           => 'required|string',
            'fare'              => 'required|numeric',
            'discount'          => 'required|numeric',
            'amount'            => 'required|numeric',
            'total_amount'      => 'required|numeric',
            'status'            => 'required|string',
            'origin_branch_id'  => 'nullable|exists:branches,id',
            'destination_branch_id' => 'nullable|exists:branches,id',
            'assigned_staff_id' => 'nullable|exists:staff,id',
            'origin'            => 'required|string',
            'destination'       => 'required|string',
        ]);

        Parcel::create($request->all());

        return redirect()->route('parcels.index')->with('success', 'Parcel created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Parcel $parcel)
    {
        return view('parcels.show', compact('parcel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Parcel $parcel)
    {
        $customers = Customer::all();
        $branches  = Branch::all();
        $staff     = Staff::all();
        return view('parcels.edit', compact('parcel', 'customers', 'branches', 'staff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Parcel $parcel)
    {
        $request->validate([
            'tracking_number'   => 'required|unique:parcels,tracking_number,' . $parcel->id,
            'customer_id'       => 'nullable|exists:customers,id',
            'receiver_name'     => 'required|string',
            'receiver_phone'    => 'required|string',
            'receiver_address'  => 'required|string',
            'parcel_type'       => 'nullable|string',
            'weight'            => 'nullable|numeric',
            'cost'              => 'required|numeric',
            'status'            => 'required|string',
            'origin_branch_id'  => 'nullable|exists:branches,id',
            'destination_branch_id' => 'nullable|exists:branches,id',
            'assigned_staff_id' => 'nullable|exists:staff,id',
        ]);

        $parcel->update($request->all());

        return redirect()->route('parcels.index')->with('success', 'Parcel updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Parcel $parcel)
    {
        $parcel->delete();
        return redirect()->route('parcels.index')->with('success', 'Parcel deleted successfully.');
    }

    public function parcelpdf($tracking_number)
    {
        $parcel = Parcel::where('tracking_number', $tracking_number)
            ->with('bookingOfficer')
            ->firstOrFail();

        $generator = new BarcodeGeneratorSVG();
        $barcode = base64_encode(
            $generator->getBarcode($tracking_number, BarcodeGenerator::TYPE_CODE_128)
        );

        $html = View::make('parcels.pdf', compact('parcel', 'barcode'))->render();
        $filename = 'Parcel_' . $parcel->tracking_number . '.pdf';
        $pdfPath = storage_path('app/public/' . $filename);

        Browsershot::html($html)
        ->format('A4')
        ->margins(10, 10, 10, 10) // optional: set margins
        ->showBackground() // include CSS background
        ->save($pdfPath);
        return response()->download($pdfPath)->deleteFileAfterSend(true);
    }
}
