<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class lead extends Model
{
    protected $fillable = [
        'product', 'source', 'status', 'description',
    ];

    public function people(): HasMany
    {
        return $this->hasMany(person::class);
    }

    public function companies(): HasMany
    {
        return $this->hasMany(company::class);
    }

    use HasFactory;
}
