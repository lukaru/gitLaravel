<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ListItem extends Model
{
    protected $fillable = ['item_name', 'quantity', 'max_price', 'shopping_list'];

    public function shoppingList () : BelongsTo{
        return $this->belongsTo(ShoppingList::class);
    }
}
