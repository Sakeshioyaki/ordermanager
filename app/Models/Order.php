<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'user_id',
        'firstName',
        'lastName',
        'address',
        'total',
        'created_at'
    ];
}
