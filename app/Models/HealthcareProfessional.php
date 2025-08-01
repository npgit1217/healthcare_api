<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthcareProfessional extends Model
{
    use HasFactory;

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
