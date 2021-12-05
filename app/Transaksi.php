<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    //
    protected $guarded = [];

    protected $attributes = [
        'status' => 0,
    ];

    public function getStatusAttribute($attribute)
    {
        return $this->statusOptions()[$attribute];
    }

    public function acara()
    {
        return $this->belongsTo(Acara::class);
    }

    public function statusOptions()
    {
        # code...
        return [
            0 => 'Pending',
            1 => 'Lunas',
            2 => 'Cancel',
        ];
    }
}
