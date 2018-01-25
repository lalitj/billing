<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(App\Vendor::class, 50)->create();
        //factory(App\Items::class, 100)->create();
        factory(App\Stocks::class, 100)->create();
        factory(App\Bills::class, 50)->create();
        factory(App\Bill_items::class, 500)->create();
        factory(App\Vendor::class, 50)->create();
        //factory(App\Bills::class,3)->create();
        //$bills->each(function ($bills) { factory('App\Bill_items' ,3)->create(['bill_id' => $bills->id,'stock_id' => $stocks->id]); });
       // factory(App\Bill_items::class,4)->create();
    }
}
//$threads->each(function ($thread) { factory('App\Reply' ,10)->create(['thread_id' => $thread->id]); });