<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeTransaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'trx_id',
        'photo_recipe',
        'phone_number',
        'address',
        'is_confirm',
        'is_paid',
        'proof',
        'total_amount',
        'note',
    ];

    public static function generateUniqueTrxId(){
        $prefix = 'TGMG';
        do {
            $randomString = $prefix . mt_rand(1000, 9999);
        } while (self::where('trx_id', $randomString)->exists());

        return $randomString;
    }
}
