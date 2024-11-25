<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'photo',
        'description',
        'price',
        'rate',
        'category_id',
    ];

    public function category (): BelongsTo {
        return $this->belongsTo(category::class);
    }

    public function transactions ():HasMany {
        return $this->hasMany(productTransaction::class);
    }

    public function testimonials (): HasMany {
        return $this->hasMany(testimonial::class);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
    
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($product) {
            if ($product->photo) {
                Storage::delete($product->photo);
            }
        });

        static::updating(function ($product) {
            if ($product->isDirty('photo')) {
                Storage::delete($product->getOriginal('photo'));
            }
        });
    }
}
