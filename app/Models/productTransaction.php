<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class productTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone_number',
        'address',
        'is_paid',
        'proof',
        'total_amount',
        'note',
        'product_id',
    ];

    public function product (): BelongsTo {
        return $this->belongsTo(product::class);
    }
}
