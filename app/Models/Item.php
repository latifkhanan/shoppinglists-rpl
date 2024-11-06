<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'quantity',
        'is_purchased',
        'shopping_list_id', // Jika Anda ingin menggunakan mass assignment untuk foreign key
    ];
    public function shoppingList() {
        return $this->belongsTo(ShoppingList::class);
    }
}
