<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'furniture_id'
    ];

    public function furnitures(){

        return $this->hasMany(Furniture::class);

    }

    public function transaction(){

        return $this->belongsTo(Transaction::class);
    }
}
