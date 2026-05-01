<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'cost',
        'stock_on_hand',
        'expiration_date',
        'barcode',
        'image',
        'variant',
        'created_by',
    ];

    public function creator(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function categories(): \Illuminate\Database\Eloquent\Relations\BelongsToMany{
        return $this->belongsToMany(Category::class,'product_categories');
    }

    public function suppliers(): \Illuminate\Database\Eloquent\Relations\BelongsToMany{
        return $this->belongsToMany(Supplier::class,'product_suppliers');
    }
    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }
}
