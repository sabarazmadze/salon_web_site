<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stylists extends Model
{
    use HasFactory;

    protected $primaryKey = 'stylist_service_id';

    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'email',
        'experience_years',
        'specialty',
    ];

    public function services()
    {
        return $this->morphToMany(Services::class, 'serviceable');
    }

    public function availability()
    {
        return $this->hasMany(StylistAvailability::class);
    }
}

