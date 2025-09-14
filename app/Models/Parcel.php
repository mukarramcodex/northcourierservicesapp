<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcel extends Model
{
    use HasFactory;

    protected $fillable = [
        'tracking_number',
        'customer_id',
        'receiver_name',
        'receiver_phone',
        'receiver_address',
        'parcel_type',
        'weight',
        'cost',
        'status',
        'origin_branch_id',
        'destination_branch_id',
        'assigned_staff_id',
        'shipped_at',
        'delivered_at',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function originBranch()
    {
        return $this->belongsTo(Branch::class, 'origin_branch_id');
    }

    public function destinationBranch()
    {
        return $this->belongsTo(Branch::class, 'destination_branch_id');
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'assigned_staff_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function trackinglog()
    {
        return $this->hasMany(TrackingLog::class);
    }
}
