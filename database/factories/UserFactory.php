<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Vendor::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'address'=>$faker->address,
        'city'=>$faker->city,
        'state'=>$faker->name,
        'tel'=>$faker->phoneNumber,
        'fax'=>$faker->randomNumber(),
        'email' => $faker->unique()->safeEmail,
        'website' => $faker->unique()->safeEmail,
        'cin_no'=>$faker->randomNumber(),
        'type' => rand(1,2)
    ];
});
$factory->define(App\Items::class, function (Faker $faker) {
    return [
        'product_name' => $faker->name,
        'potency' => $faker->numberBetween(0,2),
        'packing' => $faker->randomNumber(),
        'hsn_code' => $faker->randomDigit,
        'mfg_code' => $faker->name,
    ];
});
$factory->define(App\Stocks::class, function (Faker $faker) {
    return [
        'item_id' => function(){

            return factory(App\Items::class)->create()->id;
            },
        'vendor_id' => function(){
            return factory(App\Vendor::class)->create()->id;
        },
        'batch_no' => $faker->randomNumber(),
        'exp_date' => $faker->dateTime,
        'quantity' => $faker->numberBetween(0,3),
        'mrp' => $faker->numberBetween(0,3),
    ];
});
$factory->define(App\Bills::class, function (Faker $faker) {
    return [
        'customer_id' => function(){

            return factory(App\Vendor::class)->create()->id;
        },
        'total_amount' =>$faker->numberBetween(0,3),
        'cgst_amount' =>$faker->numberBetween(0,3),
        'sgst_amount' =>$faker->numberBetween(0,3),
        'gst_5_amount' =>$faker->numberBetween(0,3),
        'gst_12_amount' =>$faker->numberBetween(0,3),
        'gst_18_amount' =>$faker->numberBetween(0,3),
        'gst_28_amount' =>$faker->numberBetween(0,3),
        'coin_adjustment' =>$faker->numberBetween(0,3),
        'net_amount' =>$faker->numberBetween(0,3),
        'bill_date' =>$faker->dateTime(),
        'type' =>$faker->numberBetween(0,3),
    ];
});
$factory->define(App\Bill_items::class, function (Faker $faker) {
    return [
        'bill_id' => function(){
            return rand(1, 50);
        },
        /*'item_id' => function(){

            return factory(App\Items::class)->create()->id;
        },*/
        'stock_id' => function(){
            return rand(1, 100);
        },
        'quantity'=>$faker->numberBetween(0,3),
        'rate'=>$faker->numberBetween(0,3),
        'discount'=>$faker->numberBetween(0,3),
        'gst'=>$faker->numberBetween(0,3),
        'amount'=>$faker->numberBetween(0,3),
    ];
});