<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = 'doctors';
    protected $primaryKey = 'id_doctor';
    protected $fillable = [
        'name',
        'specialization_id',
        'available_days',
        'available_time_start',
        'available_time_end',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'id_doctor', 'id_doctor');
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class, 'specialization_id', 'id_specialization');
    }
}
