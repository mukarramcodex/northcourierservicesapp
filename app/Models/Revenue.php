<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    use HasFactory;

    protected $fillable = [
        'parcel_id',
        'branch_id',
        'staff_id',
        'amount',
        'revenue_date',
        'source',
        'notes',
    ];

    public function parcel()
    {
        return $this->belongsTo(Parcel::class);
    }
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}
