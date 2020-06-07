<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ShoppingList extends Model
{
    protected $fillable = ['helped_id', 'helper_id', 'due_date', 'comment_helper', 'comment_helper', 'actual_price', 'status'];

    public function helper () : BelongsTo{
        return $this->belongsTo(Helper::class);
    }

    public function helped () : BelongsTo{
        return $this->belongsTo(Helped::class);
    }

    public function items () : HasMany{
        return $this->hasMany(ListItem::class);
    }

    public function reciepts() : HasMany {
        return $this->hasMany(Reciept::class);
    }
}
