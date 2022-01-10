<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'method',
        'card_number'

    ];

    public function furnitures(){

        return $this->hasMany(Furniture::class);

    }

    public function transaction(){

        return $this->belongsTo(Transaction::class);
    }
}
