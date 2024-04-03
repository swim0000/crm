<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class company extends Model
{
    protected $fillable = [
        'name', 'website', 'email', 'phone', 'address1', 'address2', 'city', 'postcode',
    ];

    public function lead(): HasMany
    {
        return $this->hasMany(lead::class);
    }

    public function people(): HasMany
    {
        return $this->hasMany(person::class);
    }

    use HasFactory;
}
