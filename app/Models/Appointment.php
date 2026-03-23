<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'appointment_date',
        'appointment_time',
        'status',
        'notes',
    ];

    // Link to Patient
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    // Link to Doctor
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}