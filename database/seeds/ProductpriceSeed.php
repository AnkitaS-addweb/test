<?php

use Illuminate\Database\Seeder;

class ProductpriceSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'vendor_id' => 1, 'price' => '10', 'product_id' => null,],
            ['id' => 2, 'vendor_id' => 1, 'price' => '10', 'product_id' => 1,],

        ];

        foreach ($items as $item) {
            \App\Productprice::create($item);
        }
    }
}
