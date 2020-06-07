<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reciept extends Model
{
    protected $fillable = ['url', 'title'];

    public function shoppingList () : BelongsTo{
        return $this->belongsTo(ShoppingList::class);
    }
}
