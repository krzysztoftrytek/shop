<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable =[
        'quantity',
        'price',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function products(){
        return $this->belongsToMany(product::class,'product_id');
    }
    public function products2()
    {
        return $this->belongsToMany(product::class,' quantity_order_product');
    }
}
