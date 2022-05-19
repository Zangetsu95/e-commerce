<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * The `product()` function returns the product that belongs to the order
     * @returns The product that is associated with the order.
     */
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }

   /**
    * The user() function returns the user that owns the product
    * @returns The user that is associated with the product.
    */
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
