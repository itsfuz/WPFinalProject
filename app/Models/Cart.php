<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'furnitures_id',
        'quantity',
        'total_price'

    ];

    public function users(){

        return $this->hasOne(User::class);
    }

    public function furnitures(){

        return $this->hasMany(Furniture::class);
    }
}
