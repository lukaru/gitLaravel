<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Helped extends Model
{
    protected $fillable = ['name', 'password', 'address', 'birthdate'];

    public function lists () : HasMany{
        return $this->hasMany(ShoppingList::class);
    }
}
