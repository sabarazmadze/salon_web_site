<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'email',
    ];

    public function bookings()
    {
        return $this->hasMany(Bookings::class);
    }
}
