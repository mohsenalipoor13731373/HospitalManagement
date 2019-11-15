<?php

namespace Modules\Specialties\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Doctor\Entities\Doctor;

class Specialties extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class);

    }

//    protected $fillable = [];
}
