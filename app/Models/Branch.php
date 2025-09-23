<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'phone',
        'email',
        'address',
        'city',
        'status',
    ];

    public function staffs()
    {
        return $this->hasMany(Staff::class);
    }

    public function parcels()
    {
        return $this->hasMany(Parcel::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
