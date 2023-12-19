<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_user',
        'id_cart',
        'total',
        'status'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
    public function cart()
    {
        return $this->belongsTo(Cart::class, 'id_cart', 'id');
    }
}   
