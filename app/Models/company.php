<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    public function lead()
    {
        return $this->belongsTo(lead::class);
    }
    public function contacts()
    {
        return $this->hasMany(person::class);
    }
    use HasFactory;
}
