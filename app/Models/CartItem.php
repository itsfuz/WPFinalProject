<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id'
    ];

    public function carts(){

        return $this->belongsTo(Cart::class);
    }

    public function users(){

        return $this->hasOne(User::class);
    }

    public function furnitures(){

        return $this->hasMany(Furniture::class);
    }
}
