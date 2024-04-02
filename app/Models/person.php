<?php

namespace App\Models;

use App\Models\lead;
use App\Models\company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class person extends Model
{
    public function company()
    {
        return $this->belongsTo(company::class);
    }
    public function lead()
    {
        return $this->belongsTo(lead::class);
    }
    use HasFactory;
}
