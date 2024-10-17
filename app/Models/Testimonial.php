<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Testimonial extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'avatar',
        'message',
        'product_id'
    ];

    public function product(): BelongsTo {
        return $this->belongsTo(Product::class);
    }
}
