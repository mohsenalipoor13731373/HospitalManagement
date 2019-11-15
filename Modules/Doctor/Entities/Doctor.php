<?php

namespace Modules\Doctor\Entities;

use App\DoctorSpecialties;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Specialties\Entities\Specialties;

class Doctor extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];

    public function specialties()
    {
        return $this->belongsToMany(Specialties::class);

    }


//    protected $fillable = [];
}
