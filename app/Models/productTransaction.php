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
        'trx_id',
        'phone_number',
        'quantity',
        'address',
        'is_paid',
        'proof',
        'total_amount',
        'note',
        'product_id',
        'delivery_status',
    ];

    public static function generateUniqueTrxId(){
        $prefix = 'TGMG';
        do {
            $randomString = $prefix . mt_rand(1000, 9999);
        } while (self::where('trx_id', $randomString)->exists());

        return $randomString;
    }

    public function product (): BelongsTo {
        return $this->belongsTo(product::class);
    }
}
