<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    protected $table = 'specializations';
    protected $primaryKey = 'id_specialization';
    protected $fillable = [
        'name',
        'description',
    ];

    public function doctors()
    {
        return $this->hasMany(Doctor::class, 'specialization_id', 'id_specialization');
    }
}
