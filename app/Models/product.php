<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'amount',
        'price',
        'image',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(productCategory::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class,'product_id');
    }
    public function orders2()
    {
        return $this->belongsToMany(Order::class,'quantity_order_product');
    }

}
