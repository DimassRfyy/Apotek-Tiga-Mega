<?php

namespace App\Models;

use App\Models\product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'icon',
    ];

    public function products ():HasMany {
        return $this->hasMany(product::class);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($category) {
            if ($category->icon) {
                Storage::delete($category->icon);
            }
        });

        static::updating(function ($category) {
            if ($category->isDirty('icon')) {
                Storage::delete($category->getOriginal('icon'));
            }
        });
    }
}
