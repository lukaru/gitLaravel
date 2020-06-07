<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Helper extends Model
{
    protected $fillable = ['name', 'password', 'address', 'birthdate', 'count_of_done'];

    public function lists () : HasMany{
        return $this->hasMany(ShoppingList::class);
    }
}
