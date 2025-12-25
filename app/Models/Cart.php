<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    // Tambahkan baris ini
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
    ];

    /**
     * Relasi ke User (Satu baris keranjang milik satu user)
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke Product (Satu baris keranjang merujuk ke satu produk)
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}