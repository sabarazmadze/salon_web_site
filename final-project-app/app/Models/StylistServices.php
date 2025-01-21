<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StylistServices extends Model
{
    use HasFactory;

    protected $primaryKey = 'stylist_service_id';

    protected $fillable = [
        'serviceable_id',
        'serviceable_type',
        'stylist_id',
    ];

    public function stylist()
    {
        return $this->belongsTo(Stylists::class);
    }

    public function serviceable()
    {
        return $this->morphTo();
    }
}
