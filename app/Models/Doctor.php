<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    //
    protected $fillable = [
        'department_id',
        'name',
        'email',
        'phone',
        'specialization',
        'Image',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function schedules()
{
    return $this->hasMany(DoctorSchedule::class);
}

public function appointments()
{
    return $this->hasMany(Appointment::class);
}
}
