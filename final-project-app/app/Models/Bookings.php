<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    use HasFactory;

    protected $primaryKey = 'booking_id';

    protected $fillable = [
        'bookable_id',
        'bookable_type',
        'client_id',
        'booking_date',
        'booking_time',
        'notes',
    ];

    public function client()
    {
        return $this->belongsTo(Clients::class);
    }

    public function bookable()
    {
        return $this->morphTo();
    }
}
