<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Transaksi;
use App\Acara;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(Transaksi::class, function (Faker $faker) {

    $now = Carbon::now()->format('Ymd-his');
        $latestOrder = Transaksi::orderBy('created_at','DESC')->first();

    return [
        //
        'acara_id' => function (){
            return Acara::all()->random();
        },
        'nama' => $faker->name,
        'telpon' => $faker->phoneNumber,
        'email' => $faker->safeEmail,
        'invoice' => 'INV-'.$now.'-'.str_pad($latestOrder , 6, "0", STR_PAD_LEFT),
        'qty' => rand(0, 10),
        'status' => rand(0,3)
    ];
});
