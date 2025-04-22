<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'patients';
    protected $primaryKey = 'id_patient';
    protected $fillable = [
        'name',
        'email',
        'phone',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'id_patient', 'id_patient');
    }
}
