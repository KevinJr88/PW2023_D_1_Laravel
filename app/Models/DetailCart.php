<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailCart extends Model
{
    use HasFactory;
    protected $table = 'detail_carts';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id_menu',
        'id_cart',
        'quantity',
    ];
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'id_menu', 'id');
    }
    public function cart()
    {
        return $this->belongsTo(Cart::class, 'id_cart', 'id');
    }
}