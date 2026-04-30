<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = ['product_id', 'quantity','quantityType'];

    public function product(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    protected static function booted(): void
    {
        static::created(function ($inventory) {

            $product = $inventory->product;

            if ($inventory->quantityType === 'in') {
                $product->increment('stockOnHand', $inventory->quantity);
            }

            if ($inventory->quantityType === 'out') {
                $product->decrement('stockOnHand', $inventory->quantity);
            }
        });
    }
}
