<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = ['product_id', 'quantity','quantity_type'];

    public function product(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    protected static function booted(): void
    {
        static::created(function ($inventory) {

            $product = $inventory->product;

            if ($inventory->quantity_type === 'in') {
                $product->increment('stock_on_hand', $inventory->quantity);
            }

            if ($inventory->quantity_type === 'out') {
                $product->decrement('stock_on_hand', $inventory->quantity);
            }
        });
    }
}
