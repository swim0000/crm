<?php

namespace App\Models;

use App\Models\lead;
use App\Models\company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class person extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'address1', 'address2', 'city', 'postcode', 'company_id', 'job_title',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(company::class, 'company_id');
    }

    public function lead(): HasMany
    {
        return $this->hasMany(lead::class);
    }

    use HasFactory;
}
