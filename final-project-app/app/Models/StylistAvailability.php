<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StylistAvailability extends Model
{
    use HasFactory;

    protected $primaryKey = 'availability_id';

    protected $fillable = [
        'stylist_id',
        'available_date',
        'available_start_time',
        'available_end_time',
    ];

    public function stylist()
    {
        return $this->belongsTo(Stylists::class);
    }
}
