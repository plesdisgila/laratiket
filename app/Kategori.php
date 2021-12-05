<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    //
    protected $guarded = [];

    public function acara()
    {
        return $this->hasMany(Acara::class);
    }
}
