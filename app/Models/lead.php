<?php

namespace App\Models;

use App\Models\person;
use App\Models\company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class lead extends Model

{
    protected $fillable = [
        'product', 'source', 'status', 'description', 'people_id', 'company_id', 
    ];

    public function person(): BelongsTo
    {
        return $this->belongsTo(person::class, 'company_id');
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(company::class, 'company_id');
    }

    use HasFactory;
}
