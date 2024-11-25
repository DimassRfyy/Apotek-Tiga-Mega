<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Testimonial extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'avatar',
        'message',
        'product_id'
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($testimonial) {
            if ($testimonial->avatar) {
                Storage::delete($testimonial->avatar);
            }
        });

        static::updating(function ($testimonial) {
            if ($testimonial->isDirty('avatar')) {
                Storage::delete($testimonial->getOriginal('avatar'));
            }
        });
    }

    public function product(): BelongsTo {
        return $this->belongsTo(Product::class);
    }
}
