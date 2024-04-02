<?php

namespace App\Models;

use App\Models\person;
use App\Models\company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class lead extends Model
{
    public function people()
    {
        return $this->hasMany(person::class);
    }
    public function companies()
    {
        return $this->hasMany(company::class);
    }
    use HasFactory;
}
