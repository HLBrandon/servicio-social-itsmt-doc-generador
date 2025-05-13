<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Boss extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    public function careers(): HasMany
    {
        return $this->hasMany(Career::class);
    }
}
