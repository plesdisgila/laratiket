<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Acara;
use App\Kategori;
use Faker\Generator as Faker;

$factory->define(Acara::class, function (Faker $faker) {

    $nama_acara = $faker->sentence;
    $slug = Str::slug($nama_acara, '-');

    return [
        //
        'kategori_id' => function (){
            return Kategori::all()->random();
        },
        'nama_acara' => $nama_acara,
        'slug_acara' => $slug,
        'deskripsi'=> $faker->paragraph,
        'gambar' => $faker->imageUrl($width = 400, $height = 200),
        'lokasi' => $faker->address,
        'waktu' => $faker->dateTimeBetween('+0 days', '+1 years', $timezone = null),
        'jenis' => $faker->randomElement(['Regular', 'VIP', 'Early Access', 'Pre Order', 'Free']),
        'harga' => rand(0, 100000),
        'jumlah' => rand(100, 1000)
    ];
});
