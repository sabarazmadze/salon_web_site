<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;

    protected $primaryKey = 'service_id';

    protected $fillable = [
        'service_name',
        'description',
        'duration_minutes',
        'price',
    ];

    public function stylists()
    {
        return $this->morphedByMany(Stylists::class, 'serviceable');
    }
}
