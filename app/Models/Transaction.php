<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = "transactions";
    protected $fillable = [
        'users_id',
        'payment_method',
        'card_number'

    ];

    public function transaction_details(){

        return $this->hasOne(TransactionDetail::class);

    }

    public function users(){

        return $this->belongsTo(User::class);

    }

}
