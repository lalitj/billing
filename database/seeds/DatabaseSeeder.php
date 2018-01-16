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
        factory(App\Vendor::class,20)->create();
        factory(App\Items::class,20)->create();
        factory(App\Stocks::class,20)->create();
        factory(App\Bills::class,20)->create();
        factory(App\Bill_items::class,20)->create();
    }
}
