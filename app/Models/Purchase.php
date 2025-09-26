<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    protected $fillable = [
        'product_id',
        'quantity',
        'options',
        'purchased_at',
    ];

    protected $casts = [
        'options' => 'array',
    ];

    protected static function booted()
    {
        static::creating(function ($purchase) {
            if (!$purchase->purchasad_at) {
                $purchase->purchased_at = now();
            }
        });
    }
}
