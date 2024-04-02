<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class person extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'address1', 'address2', 'city', 'postcode',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(company::class,'company_id');
    }

    public function lead(): BelongsTo
    {
        return $this->belongsTo(lead::class,'lead_id');
    }

    use HasFactory;
}
