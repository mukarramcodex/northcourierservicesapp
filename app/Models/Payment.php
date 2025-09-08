<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'parcel_id',
        'customer_id',
        'staff_id',
        'branch_id',
        'amount',
        'method',
        'transaction_id',
        'status',
        'paid_at',
        'notes',
    ];

    public function parcel()
    {
        return $this->belongsTo(Parcel::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
