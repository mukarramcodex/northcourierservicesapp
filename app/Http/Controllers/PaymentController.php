<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Customer;
use App\Models\Parcel;
use App\Models\Payment;
use App\Models\Staff;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::with(['parcel', 'customer', 'staff', 'branch'])->latest()->paginate(10);
        return view('payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('payments.create', [
            'parcels' => Parcel::all(),
            'customers' => Customer::all(),
            'staffs' => Staff::all(),
            'branches' => Branch::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'parcel_id' => 'nullable|exists:parcels,id',
            'customer_id' => 'nullable|exists:customers,id',
            'staff_id' => 'nullable|exists:staff,id',
            'branch_id' => 'nullable|exists:branches,id',
            'amount' => 'required|numeric|min:0',
            'method' => 'required|in:cash,card,bank_transfer,online',
            'transaction_id' => 'nullable|string|max:255',
            'status' => 'required|in:pending,completed,failed,refunded',
            'paid_at' => 'nullable|date',
            'notes' => 'nullable|string',
        ]);

        Payment::create($validated);

        return redirect()->route('payments.index')->with('success', 'Payment created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        return view('payments.show', compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        return view('payments.edit', [
            'payment' => $payment,
            'parcels' => Parcel::all(),
            'customers' => Customer::all(),
            'staffs' => Staff::all(),
            'branches' => Branch::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        $validated = $request->validate([
            'parcel_id' => 'nullable|exists:parcels,id',
            'customer_id' => 'nullable|exists:customers,id',
            'staff_id' => 'nullable|exists:staff,id',
            'branch_id' => 'nullable|exists:branches,id',
            'amount' => 'required|numeric|min:0',
            'method' => 'required|in:cash,card,bank_transfer,online',
            'transaction_id' => 'nullable|string|max:255',
            'status' => 'required|in:pending,completed,failed,refunded',
            'paid_at' => 'nullable|date',
            'notes' => 'nullable|string',
        ]);

        $payment->update($validated);

        return redirect()->route('payments.index')->with('success', 'Payment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->route('payments.index')->with('success', 'Payment deleted successfully.');
    }
}
