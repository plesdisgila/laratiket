<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acara extends Model
{
    //
    protected $guarded = [];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
