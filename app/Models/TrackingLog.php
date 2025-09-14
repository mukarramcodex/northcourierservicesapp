<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrackingLog extends Model
{
    protected $fillable = [
        'parcel_id', 'status', 'location', 'remarks', 'logged_at'
    ];

    public function parcel()
    {
        return $this->belongsTo(Parcel::class);
    }
}
